<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionInfo;
use Illuminate\Support\Facades\Http;

class QuestionInfoCunt extends Component
{
    public $default_resume_path = '';
    public $years_of_experience = '';
    public $require_visa = '';
    public $website = '';
    public $linkedIn = '';
    public $us_citizenship = '';
    public $desired_salary = '';
    public $current_ctc = '';
    public $notice_period = '';
    public $linkedin_headline = '';
    public $linkedin_summary = '';
    public $cover_letter = '';
    public $user_information_all = '';
    public $recent_employer = '';
    public $confidence_level = '';
    public $pause_before_submit = false;
    public $pause_at_failed_question = false;
    public $overwrite_previous_answers = false;

    protected $rules = [
        'default_resume_path' => 'nullable|string',
        'years_of_experience' => 'nullable|string',
        'require_visa' => 'nullable|string',
        'website' => 'nullable|string',
        'linkedIn' => 'nullable|string',
        'us_citizenship' => 'nullable|string',
        'desired_salary' => 'nullable|string',
        'current_ctc' => 'nullable|string',
        'notice_period' => 'nullable|string',
        'linkedin_headline' => 'nullable|string',
        'linkedin_summary' => 'nullable|string',
        'cover_letter' => 'nullable|string',
        'user_information_all' => 'nullable|string',
        'recent_employer' => 'nullable|string',
        'confidence_level' => 'nullable|string',
        'pause_before_submit' => 'boolean',
        'pause_at_failed_question' => 'boolean',
        'overwrite_previous_answers' => 'boolean',
    ];

    public function questionInfoExists()
    {
        return QuestionInfo::where('user_id', Auth::id())->exists();
    }

    public function mount()
    {
        $questionInfo = QuestionInfo::where('user_id', Auth::id())->first();
        
        if ($questionInfo) {
            $this->fill($questionInfo->toArray());
        }
    }

public function save()
{
    $validatedData = $this->validate();
    $validatedData['user_id'] = Auth::id();

    // Sanitize empty strings into null
    foreach (['years_of_experience', 'desired_salary', 'current_ctc', 'notice_period'] as $field) {
        if (trim($validatedData[$field]) === '') {
            $validatedData[$field] = null;
        }
    }

    QuestionInfo::updateOrCreate(
        ['user_id' => Auth::id()],
        $validatedData
    );

    $this->sendToServer($validatedData);

    session()->flash('success', 'Question Info saved');
}

private function sendToServer($data)
{
    try {
        $response = Http::timeout(10)->post('http://localhost:8001/api/update-questions', $data);

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


    public function render()
    {
        return view('livewire.question-info-cunt');
    }
}
