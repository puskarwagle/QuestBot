<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-search" class="peer hidden" {{ $this->searchInfoExists() ? 'checked' : '' }} />

    <label for="collapse-toggle-search" class="collapse-title text-xl font-bold text-blue-400 cursor-pointer text-center peer-checked:text-blue-300">
        Search Info Config {{ $this->searchInfoExists() ? '(Saved)' : '' }}
    </label>

    <div class="collapse-content text-blue-300 hidden peer-checked:flex flex-col">
        <form wire:submit.prevent="save" class="space-y-4">
            
            <!-- Search Terms & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Search Terms (comma-separated)</label>
                    <input type="text" wire:model="search_terms" placeholder="Laravel, PHP, Backend" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('search_terms') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Search Location</label>
                    <input type="text" wire:model="search_location" placeholder="New York, NY" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('search_location') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Switch Number & Current Experience -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Switch Number</label>
                    <input type="text" wire:model="switch_number" placeholder="1" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('switch_number') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current Experience</label>
                    <input type="text" wire:model="current_experience" placeholder="5 years" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('current_experience') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Sort By</label>
                    <select wire:model="sort_by" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                        <option value="">-- Select --</option>
                        <option value="Most recent">Most recent</option>
                        <option value="Most relevant">Most relevant</option>
                    </select>
                    @error('sort_by') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Date Posted</label>
                    <select wire:model="date_posted" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                        <option value="">-- Select --</option>
                        <option value="Past 24 hours">Past 24 hours</option>
                        <option value="Past week">Past week</option>
                        <option value="Past month">Past month</option>
                    </select>
                    @error('date_posted') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Salary</label>
                    <input type="text" wire:model="salary" placeholder="$80,000+" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('salary') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Multi-Select Arrays -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Experience Level (comma-separated)</label>
                    <input type="text" wire:model="experience_level" placeholder="Entry level, Mid-Senior level" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('experience_level') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Job Type (comma-separated)</label>
                    <input type="text" wire:model="job_type" placeholder="Full-time, Contract" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('job_type') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">On Site (comma-separated)</label>
                    <input type="text" wire:model="on_site" placeholder="Remote, On-site, Hybrid" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('on_site') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Companies (comma-separated)</label>
                    <input type="text" wire:model="companies" placeholder="Google, Meta, Amazon" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('companies') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Word Filters -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">About Company Bad Words (comma-separated)</label>
                    <input type="text" wire:model="about_company_bad_words" placeholder="startup, unpaid, internship" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('about_company_bad_words') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">About Company Good Words (comma-separated)</label>
                    <input type="text" wire:model="about_company_good_words" placeholder="established, benefits, remote" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('about_company_good_words') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Bad Words (comma-separated)</label>
                    <input type="text" wire:model="bad_words" placeholder="junior, intern, entry" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-blue-400 focus:outline-none focus:border-blue-500">
                    @error('bad_words') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Boolean Filters -->
            <div class="border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Filter Options</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="randomize_search_order" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Randomize search order</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="easy_apply_only" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Easy apply only</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="under_10_applicants" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Under 10 applicants</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="in_your_network" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>In your network</span>
                        </label>
                    </div>
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="fair_chance_employer" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Fair chance employer</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="security_clearance" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Security clearance</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="did_masters" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Did masters</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="pause_after_filters" class="mr-2 bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                            <span>Pause after filters</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Save Search Info
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