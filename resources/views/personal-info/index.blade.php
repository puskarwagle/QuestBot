<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-personal" class="peer hidden" />

    <label for="collapse-toggle-personal" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Personal Info Config
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form method="POST" action="{{ url('/personal-info') }}" class="space-y-4">
            @csrf

            <!-- Legal Name -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        placeholder="First"
                        required
                        value="{{ old('first_name', $info->first_name ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Middle Name</label>
                    <input
                        type="text"
                        name="middle_name"
                        placeholder="Middle"
                        value="{{ old('middle_name', $info->middle_name ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        placeholder="Last"
                        required
                        value="{{ old('last_name', $info->last_name ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
            </div>

            <!-- Contact -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Phone Number</label>
                    <input
                        type="text"
                        name="phone_number"
                        placeholder="9876543210"
                        required
                        value="{{ old('phone_number', $info->phone_number ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current City</label>
                    <input
                        type="text"
                        name="current_city"
                        placeholder="e.g., Sydney"
                        value="{{ old('current_city', $info->current_city ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
            </div>

            <!-- Address -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Street Address</label>
                    <input
                        type="text"
                        name="street"
                        placeholder="e.g., 10-12 Bridge St., Granville"
                        value="{{ old('street', $info->street ?? '') }}"
                        class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                    >
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">State</label>
                        <input
                            type="text"
                            name="state"
                            placeholder="e.g., NSW"
                            value="{{ old('state', $info->state ?? '') }}"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Zipcode</label>
                        <input
                            type="text"
                            name="zipcode"
                            placeholder="e.g., 2142"
                            value="{{ old('zipcode', $info->zipcode ?? '') }}"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Country</label>
                        <input
                            type="text"
                            name="country"
                            placeholder="e.g., Australia"
                            value="{{ old('country', $info->country ?? '') }}"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                    </div>
                </div>
            </div>

            <!-- US Equal Opportunity -->
            <div class="border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Equal Opportunity (Optional)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Ethnicity</label>
                        <select
                            name="ethnicity"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                            <option value="">-- Select --</option>
                            @foreach (['Decline','Hispanic/Latino','American Indian or Alaska Native','Asian','Black or African American','Native Hawaiian or Other Pacific Islander','White','Other'] as $option)
                                <option value="{{ $option }}" {{ (old('ethnicity', $info->ethnicity ?? '') === $option) ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select
                            name="gender"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                            <option value="">-- Select --</option>
                            @foreach (['Male','Female','Other','Decline'] as $option)
                                <option value="{{ $option }}" {{ (old('gender', $info->gender ?? '') === $option) ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Disability Status</label>
                        <select
                            name="disability_status"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                                <option value="{{ $option }}" {{ (old('disability_status', $info->disability_status ?? '') === $option) ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Veteran Status</label>
                        <select
                            name="veteran_status"
                            class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"
                        >
                            <option value="">-- Select --</option>
                            @foreach (['Yes','No','Decline'] as $option)
                                <option value="{{ $option }}" {{ (old('veteran_status', $info->veteran_status ?? '') === $option) ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Update personals.py
                </button>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-4 p-3 rounded bg-red-700 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
