<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SecretInfo;

class SecretInfoCunt extends Component
{
    public $username = '';
    public $password = '';
    public $use_AI = false;
    public $ai_provider = '';
    public $deepseek_api_url = '';
    public $deepseek_api_key = '';
    public $deepseek_model = '';
    public $llm_api_url = '';
    public $llm_api_key = '';
    public $llm_model = '';
    public $llm_spec = '';
    public $stream_output = false;

    protected $rules = [
        'username' => 'nullable|string',
        'password' => 'nullable|string',
        'use_AI' => 'boolean',
        'ai_provider' => 'nullable|string',
        'deepseek_api_url' => 'nullable|string',
        'deepseek_api_key' => 'nullable|string',
        'deepseek_model' => 'nullable|string',
        'llm_api_url' => 'nullable|string',
        'llm_api_key' => 'nullable|string',
        'llm_model' => 'nullable|string',
        'llm_spec' => 'nullable|string',
        'stream_output' => 'boolean',
    ];

    public function mount()
    {
        $secretInfo = SecretInfo::where('user_id', Auth::id())->first();
        if ($secretInfo) {
            $this->fill($secretInfo->toArray());
        }
    }

    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        SecretInfo::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        session()->flash('success', 'Secret Info saved');
    }

    public function secretInfoExists()
    {
        return SecretInfo::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.secret-info-cunt');
    }
}