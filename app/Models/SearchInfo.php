<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchInfo extends Model
{
    protected $fillable = [
        'user_id',
        'search_terms',
        'search_location',
        'switch_number',
        'randomize_search_order',
        'sort_by',
        'date_posted',
        'salary',
        'easy_apply_only',
        'experience_level',
        'job_type',
        'on_site',
        'companies',
        'under_10_applicants',
        'in_your_network',
        'fair_chance_employer',
        'about_company_bad_words',
        'about_company_good_words',
        'bad_words',
        'security_clearance',
        'did_masters',
        'current_experience',
        'pause_after_filters',
    ];

    protected $casts = [
        'search_terms' => 'array',
        'experience_level' => 'array',
        'job_type' => 'array',
        'on_site' => 'array',
        'companies' => 'array',
        'about_company_bad_words' => 'array',
        'about_company_good_words' => 'array',
        'bad_words' => 'array',
        'randomize_search_order' => 'boolean',
        'easy_apply_only' => 'boolean',
        'under_10_applicants' => 'boolean',
        'in_your_network' => 'boolean',
        'fair_chance_employer' => 'boolean',
        'security_clearance' => 'boolean',
        'did_masters' => 'boolean',
        'pause_after_filters' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}