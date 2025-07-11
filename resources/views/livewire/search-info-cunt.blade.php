<div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
    <div class="card-body">
        <h2 class="card-title text-2xl mb-6">
            Search Info Config {{ $this->searchInfoExists() ? '(Saved)' : '' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-6">

            <!-- Search Terms & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Search Terms (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="search_terms" placeholder="Laravel, PHP, Backend" class="input input-bordered w-full">
                    @error('search_terms') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Search Location</span>
                    </label>
                    <input type="text" wire:model="search_location" placeholder="New York, NY" class="input input-bordered w-full">
                    @error('search_location') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Switch Number & Current Experience -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Switch Number</span>
                    </label>
                    <input type="text" wire:model="switch_number" placeholder="1" class="input input-bordered w-full">
                    @error('switch_number') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Current Experience</span>
                    </label>
                    <input type="text" wire:model="current_experience" placeholder="5 years" class="input input-bordered w-full">
                    @error('current_experience') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Sort By</span>
                    </label>
                    <select wire:model="sort_by" class="select select-bordered w-full">
                        <option value="">-- Select --</option>
                        <option value="Most recent">Most recent</option>
                        <option value="Most relevant">Most relevant</option>
                    </select>
                    @error('sort_by') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Date Posted</span>
                    </label>
                    <select wire:model="date_posted" class="select select-bordered w-full">
                        <option value="">-- Select --</option>
                        <option value="Past 24 hours">Past 24 hours</option>
                        <option value="Past week">Past week</option>
                        <option value="Past month">Past month</option>
                    </select>
                    @error('date_posted') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Salary</span>
                    </label>
                    <input type="text" wire:model="salary" placeholder="$80,000+" class="input input-bordered w-full">
                    @error('salary') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Multi-Select Arrays -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Experience Level (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="experience_level" placeholder="Entry level, Mid-Senior level" class="input input-bordered w-full">
                    @error('experience_level') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Job Type (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="job_type" placeholder="Full-time, Contract" class="input input-bordered w-full">
                    @error('job_type') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">On Site (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="on_site" placeholder="Remote, On-site, Hybrid" class="input input-bordered w-full">
                    @error('on_site') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Companies (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="companies" placeholder="Google, Meta, Amazon" class="input input-bordered w-full">
                    @error('companies') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Word Filters -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">About Company Bad Words (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="about_company_bad_words" placeholder="startup, unpaid, internship" class="input input-bordered w-full">
                    @error('about_company_bad_words') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">About Company Good Words (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="about_company_good_words" placeholder="established, benefits, remote" class="input input-bordered w-full">
                    @error('about_company_good_words') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Bad Words (comma-separated)</span>
                    </label>
                    <input type="text" wire:model="bad_words" placeholder="junior, intern, entry" class="input input-bordered w-full">
                    @error('bad_words') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Boolean Filters -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Filter Options</h3>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <div class="space-y-2 flex justify-evenly">
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="randomize_search_order" class="checkbox checkbox-primary">
                            <span class="label-text">Randomize search order</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="easy_apply_only" class="checkbox checkbox-primary">
                            <span class="label-text">Easy apply only</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="under_10_applicants" class="checkbox checkbox-primary">
                            <span class="label-text">Under 10 applicants</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="in_your_network" class="checkbox checkbox-primary">
                            <span class="label-text">In your network</span>
                        </label>
                    </div>
                    <div class="space-y-2 flex justify-evenly">
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="fair_chance_employer" class="checkbox checkbox-primary">
                            <span class="label-text">Fair chance employer</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="security_clearance" class="checkbox checkbox-primary">
                            <span class="label-text">Security clearance</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="did_masters" class="checkbox checkbox-primary">
                            <span class="label-text">Did masters</span>
                        </label>
                        <label class="label cursor-pointer">
                            <input type="checkbox" wire:model="pause_after_filters" class="checkbox checkbox-primary">
                            <span class="label-text">Pause after filters</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card-actions justify-end pt-4">
                <button type="submit" class="btn btn-primary btn-wide">
                    Save Search Info
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