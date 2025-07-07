<div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
    <div class="card-body">
        <h2 class="card-title text-2xl mb-6">
            Bot Config {{ $this->botConfigExists() ? '(Saved)' : '' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-6">
            <!-- LinkedIn Bot Settings -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">LinkedIn Bot Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="close_tabs" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Close tabs after processing</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="follow_companies" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Follow companies when applying</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Runtime Behavior -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Runtime Behavior</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="run_non_stop" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Run non-stop</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="alternate_sortby" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Alternate sort order</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="cycle_date_posted" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Cycle date posted filters</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="stop_date_cycle_at_24hr" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Stop date cycle at 24hr</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- File Paths -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Files & Paths</h3>
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Generated Resume Path</span>
                        </label>
                        <input type="text" wire:model="generated_resume_path" placeholder="Path to generated resume" class="input input-bordered w-full">
                        @error('generated_resume_path') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">File Name</span>
                            </label>
                            <input type="text" wire:model="file_name" placeholder="Output file name" class="input input-bordered w-full">
                            @error('file_name') 
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                        
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Failed File Name</span>
                            </label>
                            <input type="text" wire:model="failed_file_name" placeholder="Failed attempts file" class="input input-bordered w-full">
                            @error('failed_file_name') 
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Logs Folder Path</span>
                        </label>
                        <input type="text" wire:model="logs_folder_path" placeholder="Path to logs folder" class="input input-bordered w-full">
                        @error('logs_folder_path') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Execution Settings -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Execution Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Click Gap (ms)</span>
                        </label>
                        <input type="number" wire:model="click_gap" placeholder="Delay between clicks" min="0" class="input input-bordered w-full">
                        @error('click_gap') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="run_in_background" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Run in background</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Performance -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Performance</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="disable_extensions" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Disable browser extensions</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="safe_mode" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Safe mode</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="smooth_scroll" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Smooth scroll</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="keep_screen_awake" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Keep screen awake</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Advanced Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="stealth_mode" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Stealth mode</span>
                        </label>
                    </div>
                    
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" wire:model="showAiErrorAlerts" class="checkbox checkbox-primary">
                            <span class="label-text font-medium">Show AI error alerts</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="card-actions justify-end pt-4">
                <button type="submit" class="btn btn-primary btn-wide">
                    Save Bot Config
                </button>
            </div>
        </form>

        <!-- Success/Error Messages -->
        @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if (session()->has('server_success'))
        <div class="alert alert-success mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('server_success') }}</span>
        </div>
        @endif

        @if (session()->has('server_error'))
        <div class="alert alert-error mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('server_error') }}</span>
        </div>
        @endif
    </div>
</div>