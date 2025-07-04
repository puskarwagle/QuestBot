<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-personal" class="peer hidden" />

    <label for="collapse-toggle-personal" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Personal Info Config
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form id="personalsForm" class="space-y-4">
            <!-- Legal Name -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">First Name</label>
                    <input type="text" name="first_name" placeholder="First" required class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Middle Name</label>
                    <input type="text" name="middle_name" placeholder="Middle" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Last Name</label>
                    <input type="text" name="last_name" placeholder="Last" required class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- Contact -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Phone Number</label>
                    <input type="text" name="phone_number" placeholder="9876543210" required class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current City</label>
                    <input type="text" name="current_city" placeholder="e.g., Sydney" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- Address -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Street Address</label>
                    <input type="text" name="street" placeholder="e.g., 10-12 Bridge St., Granville" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">State</label>
                        <input type="text" name="state" placeholder="e.g., NSW" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Zipcode</label>
                        <input type="text" name="zipcode" placeholder="e.g., 2142" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Country</label>
                        <input type="text" name="country" placeholder="e.g., Australia" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                </div>
            </div>

            <!-- US Equal Opportunity -->
            <div class="border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Equal Opportunity (Optional)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Ethnicity</label>
                        <select name="ethnicity" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            <option value="Decline">Decline</option>
                            <option value="Hispanic/Latino">Hispanic/Latino</option>
                            <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                            <option value="Asian">Asian</option>
                            <option value="Black or African American">Black or African American</option>
                            <option value="Native Hawaiian or Other Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                            <option value="White">White</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select name="gender" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            <option value="Decline">Decline</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Disability Status</label>
                        <select name="disability_status" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Decline">Decline</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Veteran Status</label>
                        <select name="veteran_status" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Decline">Decline</option>
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
        <!-- Status -->
        <div id="updateStatus" class="mt-4 p-3 rounded hidden">
            <span id="statusMessage"></span>
        </div>
    </div>
</div>

<script>
    document.getElementById('personalsForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        // Show loading
        showStatus('Updating personals.py...', 'bg-yellow-600');

        try {
            const response = await fetch('http://localhost:8001/api/update-personals', {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                , }
                , body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showStatus('✅ personals.py updated successfully!', 'bg-green-600');
            } else {
                showStatus('❌ Error: ' + result.detail, 'bg-red-600');
            }
        } catch (error) {
            showStatus('❌ Network error: ' + error.message, 'bg-red-600');
        }
    });

    function showStatus(message, bgClass) {
        const status = document.getElementById('updateStatus');
        const messageEl = document.getElementById('statusMessage');

        status.className = `mt-4 p-3 rounded text-white ${bgClass}`;
        messageEl.textContent = message;
        status.classList.remove('hidden');

        // Hide after 3 seconds if success
        if (bgClass.includes('green')) {
            setTimeout(() => {
                status.classList.add('hidden');
            }, 3000);
        }
    }

</script>
