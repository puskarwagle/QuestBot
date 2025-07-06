<div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
    <div class="card-body">
        <h2 class="card-title text-2xl mb-6">
            Personal Info Config {{ $this->PersonalInfoExists() ? '(Saved)' : '' }}
        </h2>
        
        <form wire:submit.prevent="save" class="space-y-6">
            <!-- Names Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">First Name</span>
                        <span class="label-text-alt text-error">Required</span>
                    </label>
                    <input type="text" wire:model="first_name" placeholder="First" class="input input-bordered w-full">
                    @error('first_name') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Middle Name</span>
                    </label>
                    <input type="text" wire:model="middle_name" placeholder="Middle" class="input input-bordered w-full">
                    @error('middle_name') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Last Name</span>
                        <span class="label-text-alt text-error">Required</span>
                    </label>
                    <input type="text" wire:model="last_name" placeholder="Last" required class="input input-bordered w-full">
                    @error('last_name') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Contact Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Phone Number</span>
                        <span class="label-text-alt text-error">Required</span>
                    </label>
                    <input type="text" wire:model="phone_number" placeholder="9876543210" required class="input input-bordered w-full">
                    @error('phone_number') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Current City</span>
                    </label>
                    <input type="text" wire:model="current_city" placeholder="e.g., Sydney" class="input input-bordered w-full">
                    @error('current_city') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
            </div>

            <!-- Address Section -->
            <div class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Street Address</span>
                    </label>
                    <input type="text" wire:model="street" placeholder="e.g., 10-12 Bridge St., Granville" class="input input-bordered w-full">
                    @error('street') 
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">State</span>
                        </label>
                        <input type="text" wire:model="state" placeholder="e.g., NSW" class="input input-bordered w-full">
                        @error('state') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Zipcode</span>
                        </label>
                        <input type="text" wire:model="zipcode" placeholder="e.g., 2142" class="input input-bordered w-full">
                        @error('zipcode') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Country</span>
                        </label>
                        <input type="text" wire:model="country" placeholder="e.g., Australia" class="input input-bordered w-full">
                        @error('country') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Equal Opportunity Section -->
            <div class="divider"></div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-base-content">Equal Opportunity (Optional)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Ethnicity</span>
                        </label>
                        <select wire:model="ethnicity" class="select select-bordered w-full">
                            <option value="">-- Select --</option>
                            @foreach (['Decline','Hispanic/Latino','American Indian or Alaska Native','Asian','Black or African American','Native Hawaiian or Other Pacific Islander','White','Other'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('ethnicity') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Gender</span>
                        </label>
                        <select wire:model="gender" class="select select-bordered w-full">
                            <option value="">-- Select --</option>
                            @foreach (['Male','Female','Other','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('gender') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Disability Status</span>
                        </label>
                        <select wire:model="disability_status" class="select select-bordered w-full">
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('disability_status') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Veteran Status</span>
                        </label>
                        <select wire:model="veteran_status" class="select select-bordered w-full">
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('veteran_status') 
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
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