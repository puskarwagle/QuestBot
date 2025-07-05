<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\BotConfig;
use Illuminate\Support\Facades\Http;

class BotConfigCunt extends Component
{
    // LinkedIn Bot Settings
    public $close_tabs = false;
    public $follow_companies = false;

    // Runtime Behavior
    public $run_non_stop = false;
    public $alternate_sortby = false;
    public $cycle_date_posted = false;
    public $stop_date_cycle_at_24hr = false;

    // Resume Generator
    public $generated_resume_path = '';

    // Files & Logging
    public $file_name = '';
    public $failed_file_name = '';
    public $logs_folder_path = '';

    // Execution Settings
    public $click_gap = null;
    public $run_in_background = false;

    // Performance
    public $disable_extensions = false;
    public $safe_mode = false;
    public $smooth_scroll = false;
    public $keep_screen_awake = false;

    // Advanced Settings
    public $stealth_mode = false;
    public $showAiErrorAlerts = false;

    protected $rules = [
        'close_tabs' => 'boolean',
        'follow_companies' => 'boolean',
        'run_non_stop' => 'boolean',
        'alternate_sortby' => 'boolean',
        'cycle_date_posted' => 'boolean',
        'stop_date_cycle_at_24hr' => 'boolean',
        'generated_resume_path' => 'nullable|string',
        'file_name' => 'nullable|string',
        'failed_file_name' => 'nullable|string',
        'logs_folder_path' => 'nullable|string',
        'click_gap' => 'nullable|integer|min:0',
        'run_in_background' => 'boolean',
        'disable_extensions' => 'boolean',
        'safe_mode' => 'boolean',
        'smooth_scroll' => 'boolean',
        'keep_screen_awake' => 'boolean',
        'stealth_mode' => 'boolean',
        'showAiErrorAlerts' => 'boolean',
    ];

    public function mount()
    {
        $botConfig = BotConfig::where('user_id', Auth::id())->first();
        if ($botConfig) {
            $this->fill($botConfig->toArray());
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        BotConfig::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        // Send to external server
        $this->sendToServer($validatedData);

        session()->flash('success', 'Bot Config saved');
    }

    private function sendToServer($data)
    {
        try {
            $response = Http::timeout(10)->post('http://localhost:8001/api/update-bot-config', $data);
            
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

    public function botConfigExists()
    {
        return BotConfig::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.bot-config-cunt');
    }
}