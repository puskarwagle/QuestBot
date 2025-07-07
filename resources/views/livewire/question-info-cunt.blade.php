<div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
    <div class="card-body">
        <h2 class="card-title text-2xl mb-6">
            Question Info Config {{ $this->questionInfoExists() ? '(Saved)' : '' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-6">

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Default Resume Path</span>
                    </label>
                    <input type="text" wire:model="default_resume_path" placeholder="Path to resume" class="input input-bordered w-full">
                    @error('default_resume_path') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Years of Experience</span>
                    </label>
                    <input type="text" wire:model="years_of_experience" placeholder="e.g., 5" class="input input-bordered w-full">
                    @error('years_of_experience') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Visa & Citizenship -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Require Visa</span>
                    </label>
                    <select wire:model="require_visa" class="select select-bordered w-full">
                        <option value="">-- Select --</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('require_visa') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">US Citizenship</span>
                    </label>
                    <select wire:model="us_citizenship" class="select select-bordered w-full">
                        <option value="">-- Select --</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('us_citizenship') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Website</span>
                    </label>
                    <input type="url" wire:model="website" placeholder="https://yoursite.com" class="input input-bordered w-full">
                    @error('website') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">LinkedIn</span>
                    </label>
                    <input type="url" wire:model="linkedIn" placeholder="https://linkedin.com/in/yourprofile" class="input input-bordered w-full">
                    @error('linkedIn') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Salary & Work Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Desired Salary</span>
                    </label>
                    <input type="text" wire:model="desired_salary" placeholder="e.g., $120,000" class="input input-bordered w-full">
                    @error('desired_salary') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Current CTC</span>
                    </label>
                    <input type="text" wire:model="current_ctc" placeholder="e.g., $100,000" class="input input-bordered w-full">
                    @error('current_ctc') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Notice Period</span>
                    </label>
                    <input type="text" wire:model="notice_period" placeholder="e.g., 2 weeks" class="input input-bordered w-full">
                    @error('notice_period') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- LinkedIn Details -->
            <div class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">LinkedIn Headline</span>
                    </label>
                    <input type="text" wire:model="linkedin_headline" placeholder="e.g., Senior Software Engineer" class="input input-bordered w-full">
                    @error('linkedin_headline') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">LinkedIn Summary</span>
                    </label>
                    <textarea wire:model="linkedin_summary" placeholder="Your professional summary..." rows="4" class="textarea textarea-bordered w-full"></textarea>
                    @error('linkedin_summary') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Cover Letter & User Info -->
            <div class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Cover Letter</span>
                    </label>
                    <textarea wire:model="cover_letter" placeholder="Your cover letter template..." rows="6" class="textarea textarea-bordered w-full"></textarea>
                    @error('cover_letter') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">User Information (All)</span>
                    </label>
                    <textarea wire:model="user_information_all" placeholder="Additional user information..." rows="4" class="textarea textarea-bordered w-full"></textarea>
                    @error('user_information_all') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Additional Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Recent Employer</span>
                    </label>
                    <input type="text" wire:model="recent_employer" placeholder="e.g., Tech Corp Inc." class="input input-bordered w-full">
                    @error('recent_employer') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Confidence Level</span>
                    </label>
                    <select wire:model="confidence_level" class="select select-bordered w-full">
                        <option value="">-- Select --</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                    @error('confidence_level') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Automation Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="label cursor-pointer">
                        <input type="checkbox" wire:model="pause_before_submit" class="checkbox">
                        <span class="label-text">Pause before submit</span>
                    </label>
                    <label class="label cursor-pointer">
                        <input type="checkbox" wire:model="pause_at_failed_question" class="checkbox">
                        <span class="label-text">Pause at failed question</span>
                    </label>
                    <label class="label cursor-pointer">
                        <input type="checkbox" wire:model="overwrite_previous_answers" class="checkbox">
                        <span class="label-text">Overwrite previous answers</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card-actions justify-end pt-4">
                <button type="submit" class="btn btn-primary btn-wide">
                    Save Info
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