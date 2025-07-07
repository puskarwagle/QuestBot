<div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
    <div class="card-body">
        <h2 class="card-title text-2xl mb-6">
            Secret Info Config {{ $this->secretInfoExists() ? '(Saved)' : '' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-6">
            <!-- LinkedIn Login -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">LinkedIn Credentials</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Linkedin Username</span>
                        </label>
                        <input type="text" wire:model="linkedin_username" placeholder="LinkedIn username" autocomplete="off" class="input input-bordered w-full" required>
                        @error('linkedin_username')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div x-data="{ show: false }" class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Password</span>
                        </label>

                        <div class="flex items-center relative">
                        <input :type="show ? 'text' : 'password'" wire:model="linkedin_password" placeholder="LinkedIn password" autocomplete="new-password" class="input input-bordered w-full">
                            <button type="button" class="ml-2 text-primary hover:text-base-content" @click="show = !show" tabindex="-1">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.186-3.356M6.61 6.61A9.977 9.977 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.103 5.225M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>

                        @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    <span class="block mb-4 text-sm text-base-content w-full col-span-2">
                    Hey dear user, this is only for automation.  
                    If you fill this in, the app will automatically log into your LinkedIn and apply for jobs.  
                    If you leave it empty, you can always manually type your LinkedIn username and password every time you run this app. :)
                    </span>
                </div>
            </div>

            <!-- AI Config -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">AI Configuration</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="use_AI" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Use AI</span>
                        </label>
                        @error('use_AI')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">AI Provider</span>
                        </label>
                        <select wire:model="ai_provider" class="select select-bordered w-full">
                            <option value="">-- Select --</option>
                            @foreach (['DeepSeek', 'OpenAI', 'Local'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('ai_provider')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- DeepSeek Config -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">DeepSeek Configuration</h3>
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">API URL</span>
                        </label>
                        <input type="url" wire:model="deepseek_api_url" placeholder="https://api.deepseek.com" class="input input-bordered w-full">
                        @error('deepseek_api_url')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">API Key</span>
                            </label>
                            <input type="password" wire:model="deepseek_api_key" placeholder="sk-..." class="input input-bordered w-full">
                            @error('deepseek_api_key')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Model</span>
                            </label>
                            <input type="text" wire:model="deepseek_model" placeholder="deepseek-chat" class="input input-bordered w-full">
                            @error('deepseek_model')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Local/OpenAI LLM -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Local/OpenAI LLM</h3>
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">API URL</span>
                        </label>
                        <input type="url" wire:model="llm_api_url" placeholder="http://localhost:11434" class="input input-bordered w-full">
                        @error('llm_api_url')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">API Key</span>
                            </label>
                            <input type="password" wire:model="llm_api_key" placeholder="Optional for local" class="input input-bordered w-full">
                            @error('llm_api_key')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Model</span>
                            </label>
                            <input type="text" wire:model="llm_model" placeholder="llama3:8b" class="input input-bordered w-full">
                            @error('llm_model')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">LLM Spec</span>
                            </label>
                            <input type="text" wire:model="llm_spec" placeholder="Model specifications" class="input input-bordered w-full">
                            @error('llm_spec')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-2">
                                <input type="checkbox" wire:model="stream_output" class="checkbox checkbox-primary">
                                <span class="label-text font-medium">Stream Output</span>
                            </label>
                            @error('stream_output')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="card-actions justify-end pt-4">
                <button type="submit" class="btn btn-primary btn-wide">
                    Save Info
                </button>
            </div>
        </form>

        <!-- Success/Error Messages -->
        @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if (session()->has('server_success'))
        <div class="alert alert-success mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('server_success') }}</span>
        </div>
        @endif

        @if (session()->has('server_error'))
        <div class="alert alert-error mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('server_error') }}</span>
        </div>
        @endif
    </div>
</div>
