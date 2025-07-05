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
    public $current_experience = '';
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
        'current_experience' => 'nullable|string',
        'pause_after_filters' => 'boolean',
    ];

    public function mount()
    {
        $searchInfo = SearchInfo::where('user_id', Auth::id())->first();
        if ($searchInfo) {
            $this->fill($searchInfo->toArray());
        }
    }

public function save()
{
    $validatedData = $this->validate();
    $validatedData['user_id'] = Auth::id();

    SearchInfo::updateOrCreate(
        ['user_id' => Auth::id()],
        $validatedData
    );

    // Send to external server
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