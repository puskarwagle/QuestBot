<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-personal" class="peer hidden" {{ $this->PersonalInfoExists() ? 'checked' : '' }} />

    <label for="collapse-toggle-personal" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Personal Info Config {{ $this->PersonalInfoExists() ? '(Saved)' : '' }}
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form wire:submit.prevent="save" class="space-y-4">
            <!-- Names -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">First Name</label>
                    <input type="text" wire:model="first_name" placeholder="First" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('first_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Middle Name</label>
                    <input type="text" wire:model="middle_name" placeholder="Middle" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('middle_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Last Name</label>
                    <input type="text" wire:model="last_name" placeholder="Last" required class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('last_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Contact -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Phone Number</label>
                    <input type="text" wire:model="phone_number" placeholder="9876543210" required class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('phone_number') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current City</label>
                    <input type="text" wire:model="current_city" placeholder="e.g., Sydney" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('current_city') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Address -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Street Address</label>
                    <input type="text" wire:model="street" placeholder="e.g., 10-12 Bridge St., Granville" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    @error('street') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">State</label>
                        <input type="text" wire:model="state" placeholder="e.g., NSW" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        @error('state') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Zipcode</label>
                        <input type="text" wire:model="zipcode" placeholder="e.g., 2142" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        @error('zipcode') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Country</label>
                        <input type="text" wire:model="country" placeholder="e.g., Australia" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        @error('country') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- US Equal Opportunity -->
            <div class="border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Equal Opportunity (Optional)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Ethnicity</label>
                        <select wire:model="ethnicity" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            @foreach (['Decline','Hispanic/Latino','American Indian or Alaska Native','Asian','Black or African American','Native Hawaiian or Other Pacific Islander','White','Other'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('ethnicity') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select wire:model="gender" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            @foreach (['Male','Female','Other','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('gender') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Disability Status</label>
                        <select wire:model="disability_status" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('disability_status') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Veteran Status</label>
                        <select wire:model="veteran_status" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('veteran_status') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
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
    </div>
</div>