<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-question" class="peer hidden" {{ $this->questionInfoExists() ? 'checked' : '' }} />

    <label for="collapse-toggle-question" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Question Info Config {{ $this->questionInfoExists() ? '(Saved)' : '' }}
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form wire:submit.prevent="save" class="space-y-4">
            
            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Default Resume Path</label>
                    <input type="text" wire:model="default_resume_path" placeholder="Path to resume" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('default_resume_path') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Years of Experience</label>
                    <input type="text" wire:model="years_of_experience" placeholder="e.g., 5" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('years_of_experience') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Visa & Citizenship -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Require Visa</label>
                    <select wire:model="require_visa" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="">-- Select --</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('require_visa') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">US Citizenship</label>
                    <select wire:model="us_citizenship" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="">-- Select --</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('us_citizenship') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Website</label>
                    <input type="url" wire:model="website" placeholder="https://yoursite.com" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('website') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">LinkedIn</label>
                    <input type="url" wire:model="linkedIn" placeholder="https://linkedin.com/in/yourprofile" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('linkedIn') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Salary & Work Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desired Salary</label>
                    <input type="text" wire:model="desired_salary" placeholder="e.g., $120,000" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('desired_salary') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current CTC</label>
                    <input type="text" wire:model="current_ctc" placeholder="e.g., $100,000" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('current_ctc') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Notice Period</label>
                    <input type="text" wire:model="notice_period" placeholder="e.g., 2 weeks" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('notice_period') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- LinkedIn Details -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">LinkedIn Headline</label>
                    <input type="text" wire:model="linkedin_headline" placeholder="e.g., Senior Software Engineer" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('linkedin_headline') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">LinkedIn Summary</label>
                    <textarea wire:model="linkedin_summary" placeholder="Your professional summary..." rows="4" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
                    @error('linkedin_summary') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Cover Letter & User Info -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Cover Letter</label>
                    <textarea wire:model="cover_letter" placeholder="Your cover letter template..." rows="6" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
                    @error('cover_letter') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">User Information (All)</label>
                    <textarea wire:model="user_information_all" placeholder="Additional user information..." rows="4" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
                    @error('user_information_all') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Additional Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Recent Employer</label>
                    <input type="text" wire:model="recent_employer" placeholder="e.g., Tech Corp Inc." class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('recent_employer') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Confidence Level</label>
                    <select wire:model="confidence_level" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="">-- Select --</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                    @error('confidence_level') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Automation Settings</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="pause_before_submit" class="mr-2 bg-gray-800 border-gray-600 text-green-500 focus:ring-green-500">
                        <span>Pause before submit</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="pause_at_failed_question" class="mr-2 bg-gray-800 border-gray-600 text-green-500 focus:ring-green-500">
                        <span>Pause at failed question</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="overwrite_previous_answers" class="mr-2 bg-gray-800 border-gray-600 text-green-500 focus:ring-green-500">
                        <span>Overwrite previous answers</span>
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Save Info
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