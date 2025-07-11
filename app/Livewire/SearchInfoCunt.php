<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SearchInfo;
use Illuminate\Support\Facades\Http;

class SearchInfoCunt extends Component
{
    public $search_terms = [];
    public $search_location = '';
    public $switch_number = '';
    public $randomize_search_order = false;
    public $sort_by = '';
    public $date_posted = '';
    public $salary = '';
    public $easy_apply_only = false;
    public $experience_level = [];
    public $job_type = [];
    public $on_site = [];
    public $companies = [];
    public $under_10_applicants = false;
    public $in_your_network = false;
    public $fair_chance_employer = false;
    public $about_company_bad_words = [];
    public $about_company_good_words = [];
    public $bad_words = [];
    public $security_clearance = false;
    public $did_masters = false;
    public $current_experience = null;
    public $pause_after_filters = false;

    protected $rules = [
        'search_terms' => 'nullable|array',
        'search_location' => 'nullable|string',
        'switch_number' => 'nullable|string',
        'randomize_search_order' => 'boolean',
        'sort_by' => 'nullable|string',
        'date_posted' => 'nullable|string',
        'salary' => 'nullable|string',
        'easy_apply_only' => 'boolean',
        'experience_level' => 'nullable|array',
        'job_type' => 'nullable|array',
        'on_site' => 'nullable|array',
        'companies' => 'nullable|array',
        'under_10_applicants' => 'boolean',
        'in_your_network' => 'boolean',
        'fair_chance_employer' => 'boolean',
        'about_company_bad_words' => 'nullable|array',
        'about_company_good_words' => 'nullable|array',
        'bad_words' => 'nullable|array',
        'security_clearance' => 'boolean',
        'did_masters' => 'boolean',
        'current_experience' => 'nullable|integer',
        'pause_after_filters' => 'boolean',
    ];

    private array $commaFields = [
        'search_terms',
        'experience_level',
        'job_type',
        'on_site',
        'companies',
        'about_company_bad_words',
        'about_company_good_words',
        'bad_words',
    ];

    public function mount()
    {
        $searchInfo = SearchInfo::where('user_id', Auth::id())->first();
        if ($searchInfo) {
            $this->fill($searchInfo->toArray());
        }
    }

    private function parseCommaSeparatedFields(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = array_filter(array_map('trim', explode(',', $data[$field])));
            }
        }
        return $data;
    }

    public function save()
    {
        $input = $this->all(); // get all public properties

        // Convert comma strings to arrays BEFORE validation
        $input = $this->parseCommaSeparatedFields($input, $this->commaFields);

        // Replace Livewire properties so validation doesn't complain
        foreach ($input as $key => $val) {
            $this->$key = $val;
        }

        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        SearchInfo::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        $this->sendToServer($validatedData);

        session()->flash('success', 'Search Info saved');
    }

    private function sendToServer($data)
    {
        try {
            $response = Http::timeout(10)->post('http://localhost:8001/api/update-search', $data);

            if ($response->successful()) {
                session()->flash('server_success', '✅ Server updated successfully!');
            } else {
                $errorMsg = $response->json('detail') ?? 'Unknown server error';
                session()->flash('server_error', '❌ Server error: ' . $errorMsg);
            }
        } catch (\Exception $e) {
            session()->flash('server_error', '❌ Network error: ' . $e->getMessage());
        }
    }

    public function searchInfoExists()
    {
        return SearchInfo::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.search-info-cunt');
    }
}
