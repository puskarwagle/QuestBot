<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-secret" class="peer hidden" {{ $this->secretInfoExists() ? 'Checked' : '' }} />

    <label for="collapse-toggle-secret" class="collapse-title text-xl font-bold text-red-400 cursor-pointer text-center peer-checked:text-red-300">
        Secret Info Config {{ $this->secretInfoExists() ? '(Saved)' : '' }}
    </label>

    <div class="collapse-content text-red-300 hidden peer-checked:flex flex-col">
        <form wire:submit.prevent="save" class="space-y-4">
            <!-- LinkedIn Login -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">LinkedIn Credentials</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" wire:model="username" placeholder="LinkedIn username" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                        @error('username') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" wire:model="password" placeholder="LinkedIn password" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                        @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- AI Config -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">AI Configuration</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model="use_AI" class="form-checkbox text-red-500">
                            <span class="text-sm font-medium">Use AI</span>
                        </label>
                        @error('use_AI') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">AI Provider</label>
                        <select wire:model="ai_provider" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            <option value="">-- Select --</option>
                            @foreach (['DeepSeek', 'OpenAI', 'Local'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('ai_provider') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- DeepSeek Config -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">DeepSeek Configuration</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">API URL</label>
                        <input type="url" wire:model="deepseek_api_url" placeholder="https://api.deepseek.com" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                        @error('deepseek_api_url') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">API Key</label>
                            <input type="password" wire:model="deepseek_api_key" placeholder="sk-..." class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            @error('deepseek_api_key') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Model</label>
                            <input type="text" wire:model="deepseek_model" placeholder="deepseek-chat" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            @error('deepseek_model') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Local/OpenAI LLM -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Local/OpenAI LLM</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">API URL</label>
                        <input type="url" wire:model="llm_api_url" placeholder="http://localhost:11434" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                        @error('llm_api_url') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">API Key</label>
                            <input type="password" wire:model="llm_api_key" placeholder="Optional for local" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            @error('llm_api_key') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Model</label>
                            <input type="text" wire:model="llm_model" placeholder="llama3:8b" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            @error('llm_model') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">LLM Spec</label>
                            <input type="text" wire:model="llm_spec" placeholder="Model specifications" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-red-400 focus:outline-none focus:border-red-500">
                            @error('llm_spec') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" wire:model="stream_output" class="form-checkbox text-red-500">
                                <span class="text-sm font-medium">Stream Output</span>
                            </label>
                            @error('stream_output') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    {{ $username ? 'Update Secret Info' : 'Save Secret Info' }}
                </button>
            </div>
        </form>

        @if (session()->has('success'))
        <div class="mt-4 p-3 rounded bg-green-700 text-white">
            ✅ {{ session('success') }}
        </div>
        @endif
        @if (session()->has('server_success'))
        <div class="mt-4 p-3 rounded bg-green-700 text-white">
            {{ session('server_success') }}
        </div>
        @endif

        @if (session()->has('server_error'))
        <div class="mt-4 p-3 rounded bg-red-700 text-white">
            {{ session('server_error') }}
        </div>
        @endif
    </div>
</div>