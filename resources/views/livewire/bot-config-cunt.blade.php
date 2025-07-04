<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-botconfig" class="peer hidden" {{ $this->botConfigExists() ? 'checked' : '' }} />

    <label for="collapse-toggle-botconfig" class="collapse-title text-xl font-bold text-blue-400 cursor-pointer text-center peer-checked:text-blue-300">
        Bot Config {{ $this->botConfigExists() ? '(Saved)' : '' }}
    </label>

    <div class="collapse-content text-blue-300 hidden peer-checked:flex flex-col">
        <form wire:submit.prevent="save" class="space-y-6">
            
            <!-- LinkedIn Bot Settings -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">LinkedIn Bot Settings</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="close_tabs" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Close tabs after processing</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="follow_companies" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Follow companies when applying</span>
                    </label>
                </div>
            </div>

            <!-- Runtime Behavior -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Runtime Behavior</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="run_non_stop" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Run non-stop</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="alternate_sortby" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Alternate sort order</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="cycle_date_posted" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Cycle date posted filters</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="stop_date_cycle_at_24hr" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Stop date cycle at 24hr</span>
                    </label>
                </div>
            </div>

            <!-- File Paths -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Files & Paths</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Generated Resume Path</label>
                        <input type="text" wire:model="generated_resume_path" placeholder="Path to generated resume" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                        @error('generated_resume_path') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">File Name</label>
                            <input type="text" wire:model="file_name" placeholder="Output file name" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                            @error('file_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Failed File Name</label>
                            <input type="text" wire:model="failed_file_name" placeholder="Failed attempts file" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                            @error('failed_file_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Logs Folder Path</label>
                        <input type="text" wire:model="logs_folder_path" placeholder="Path to logs folder" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                        @error('logs_folder_path') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Execution Settings -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Execution Settings</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Click Gap (ms)</label>
                        <input type="number" wire:model="click_gap" placeholder="Delay between clicks" min="0" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                        @error('click_gap') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="run_in_background" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Run in background</span>
                    </label>
                </div>
            </div>

            <!-- Performance -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Performance</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="disable_extensions" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Disable browser extensions</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="safe_mode" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Safe mode</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="smooth_scroll" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Smooth scroll</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="keep_screen_awake" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Keep screen awake</span>
                    </label>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="border-b border-gray-700 pb-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Advanced Settings</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="stealth_mode" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Stealth mode</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="showAiErrorAlerts" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                        <span>Show AI error alerts</span>
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Save Bot Config
                </button>
            </div>
        </form>

        @if (session()->has('success'))
        <div class="mt-4 p-3 rounded bg-blue-700 text-white">
            ✅ {{ session('success') }}
        </div>
        @endif
    </div>
</div>