<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionInfo extends Model
{
    protected $fillable = [
        'user_id',
        'default_resume_path',
        'years_of_experience',
        'require_visa',
        'website',
        'linkedIn',
        'us_citizenship',
        'desired_salary',
        'current_ctc',
        'notice_period',
        'linkedin_headline',
        'linkedin_summary',
        'cover_letter',
        'user_information_all',
        'recent_employer',
        'confidence_level',
        'pause_before_submit',
        'pause_at_failed_question',
        'overwrite_previous_answers',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
