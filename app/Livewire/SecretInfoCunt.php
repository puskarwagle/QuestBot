<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SecretInfo;
use Illuminate\Support\Facades\Http;

class SecretInfoCunt extends Component
{
    public $linkedin_username = '';
    public $linkedin_password = '';
    public $use_AI = true;
    public $ai_provider = 'deepseek';
    public $deepseek_api_url = 'https://api.deepseek.com';
    public $deepseek_api_key = 'YOUR_OPENAI_API_KEY';
    public $deepseek_model = 'deepseek-chat';
    public $llm_api_url = 'https://api.openai.com/v1/';
    public $llm_api_key = 'YOUR_OPENAI_API_KEY';
    public $llm_model = 'gpt-3.5-turbo';
    public $llm_spec = 'openai';
    public $stream_output = false;

    protected $rules = [
        'linkedin_username' => 'nullable|string',
        'linkedin_password' => 'nullable|string',
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
            // Only fill non-null/non-empty values to preserve defaults
            $data = array_filter($secretInfo->toArray(), function($value, $key) {
                // Skip user_id and preserve defaults for empty values
                return $key !== 'user_id' && !is_null($value) && $value !== '';
            }, ARRAY_FILTER_USE_BOTH);
            
            $this->fill($data);
        }
    }

    // Rest of your methods stay the same...
    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();
        SecretInfo::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );
        $this->sendToServer($validatedData);
        session()->flash('success', 'Secret Info saved');
    }

    private function sendToServer($data)
    {
        // Map linkedin_username -> username, linkedin_password -> password
        $payload = $data;
        if (isset($payload['linkedin_username'])) {
            $payload['username'] = $payload['linkedin_username'];
            unset($payload['linkedin_username']);
        }
        if (isset($payload['linkedin_password'])) {
            $payload['password'] = $payload['linkedin_password'];
            unset($payload['linkedin_password']);
        }

        try {
            $response = Http::timeout(10)->post('http://localhost:8001/api/update-secrets', $payload);
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

    public function secretInfoExists()
    {
        return SecretInfo::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.secret-info-cunt');
    }
}