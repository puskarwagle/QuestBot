<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotConfig extends Model
{
    protected $fillable = [
        'user_id',
        'close_tabs',
        'follow_companies',
        'run_non_stop',
        'alternate_sortby',
        'cycle_date_posted',
        'stop_date_cycle_at_24hr',
        'generated_resume_path',
        'file_name',
        'failed_file_name',
        'logs_folder_path',
        'click_gap',
        'run_in_background',
        'disable_extensions',
        'safe_mode',
        'smooth_scroll',
        'keep_screen_awake',
        'stealth_mode',
        'showAiErrorAlerts',
    ];

    protected $casts = [
        'close_tabs' => 'boolean',
        'follow_companies' => 'boolean',
        'run_non_stop' => 'boolean',
        'alternate_sortby' => 'boolean',
        'cycle_date_posted' => 'boolean',
        'stop_date_cycle_at_24hr' => 'boolean',
        'run_in_background' => 'boolean',
        'disable_extensions' => 'boolean',
        'safe_mode' => 'boolean',
        'smooth_scroll' => 'boolean',
        'keep_screen_awake' => 'boolean',
        'stealth_mode' => 'boolean',
        'showAiErrorAlerts' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}