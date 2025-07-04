<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-search" class="peer hidden" />

    <label for="collapse-toggle-search" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Search Info Config
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <!-- Status -->
        <form id="linkedinSearchForm" class="space-y-4">

            <!-- Search Terms -->
            <div>
                <label class="block text-sm font-medium mb-1">Search Terms</label>
                <textarea name="search_terms" placeholder='e.g., ["Software Engineer", "Web Developer"]' rows="3" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500"></textarea>
            </div>

            <!-- Search Location -->
            <div>
                <label class="block text-sm font-medium mb-1">Search Location</label>
                <input type="text" name="search_location" placeholder='e.g., "United States"' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
            </div>

            <!-- Switch Number -->
            <div>
                <label class="block text-sm font-medium mb-1">Switch After N Applications</label>
                <input type="number" name="switch_number" placeholder="e.g., 30" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
            </div>

            <!-- Randomize Search Order -->
            <div>
                <label class="block text-sm font-medium mb-1">Randomize Search Order?</label>
                <select name="randomize_search_order" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                    <option value="False">False</option>
                    <option value="True">True</option>
                </select>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Sort By</label>
                    <select name="sort_by" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="">-- Select --</option>
                        <option value="Most recent">Most recent</option>
                        <option value="Most relevant">Most relevant</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Date Posted</label>
                    <select name="date_posted" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="">-- Select --</option>
                        <option value="Any time">Any time</option>
                        <option value="Past month">Past month</option>
                        <option value="Past week">Past week</option>
                        <option value="Past 24 hours">Past 24 hours</option>
                    </select>
                </div>
            </div>

            <!-- Salary -->
            <div>
                <label class="block text-sm font-medium mb-1">Salary Filter</label>
                <select name="salary" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    <option value="">-- Select --</option>
                    <option value="$40,000+">$40,000+</option>
                    <option value="$60,000+">$60,000+</option>
                    <option value="$80,000+">$80,000+</option>
                    <option value="$100,000+">$100,000+</option>
                    <option value="$120,000+">$120,000+</option>
                    <option value="$140,000+">$140,000+</option>
                    <option value="$160,000+">$160,000+</option>
                    <option value="$180,000+">$180,000+</option>
                    <option value="$200,000+">$200,000+</option>
                </select>
            </div>

            <!-- Easy Apply -->
            <div>
                <label class="block text-sm font-medium mb-1">Easy Apply Only?</label>
                <select name="easy_apply_only" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>

            <!-- Multi-Select Filters -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Experience Level</label>
                    <input type="text" name="experience_level" placeholder='e.g., ["Entry level", "Mid-Senior level"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Job Type</label>
                    <input type="text" name="job_type" placeholder='e.g., ["Full-time", "Contract"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">On-Site Type</label>
                    <input type="text" name="on_site" placeholder='e.g., ["Remote", "Hybrid"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Companies to Include</label>
                    <input type="text" name="companies" placeholder='e.g., ["Google", "Meta"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- Toggles -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Under 10 Applicants?</label>
                    <select name="under_10_applicants" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                        <option value="False">False</option>
                        <option value="True">True</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">In Your Network?</label>
                    <select name="in_your_network" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                        <option value="False">False</option>
                        <option value="True">True</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Fair Chance Employer?</label>
                    <select name="fair_chance_employer" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                        <option value="False">False</option>
                        <option value="True">True</option>
                    </select>
                </div>
            </div>

            <!-- Filters: Block Lists -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Company Bad Words</label>
                    <input type="text" name="about_company_bad_words" placeholder='e.g., ["Crossover"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Company Good Exceptions</label>
                    <input type="text" name="about_company_good_words" placeholder='e.g., ["Robert Half"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Job Description Bad Words</label>
                    <input type="text" name="bad_words" placeholder='e.g., ["PHP", "No C2C"]' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- Profile Toggles -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Security Clearance?</label>
                    <select name="security_clearance" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                        <option value="False">False</option>
                        <option value="True">True</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Have a Master's Degree?</label>
                    <select name="did_masters" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                        <option value="False">False</option>
                        <option value="True">True</option>
                    </select>
                </div>
            </div>

            <!-- Experience -->
            <div>
                <label class="block text-sm font-medium mb-1">Current Experience (years)</label>
                <input type="number" name="current_experience" placeholder='e.g., 5 or -1' class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
            </div>

            <!-- Pause After Filter -->
            <div>
                <label class="block text-sm font-medium mb-1">Pause After Filters?</label>
                <select name="pause_after_filters" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono focus:outline-none focus:border-green-500">
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Update linkedin_search.py
                </button>
            </div>
        </form>
        <div id="searchStatus" class="mt-4 p-3 rounded hidden">
            <span id="searchMessage"></span>
        </div>
    </div>
</div>



<script>
    document.getElementById('linkedinSearchForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        for (const key in data) {
            if (data[key].startsWith("[") || data[key].startsWith("{")) {
                try {
                    data[key] = JSON.parse(data[key]);
                } catch (err) {
                    console.warn(`Invalid JSON for field: ${key}`);
                }
            }
        }

        showLinkedinStatus('Updating linkedin_search.py...', 'bg-yellow-600');

        try {
            const response = await fetch('http://localhost:8001/api/update-linkedin', {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                }
                , body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showLinkedinStatus('✅ linkedin_search.py updated successfully!', 'bg-green-600');
            } else {
                showLinkedinStatus('❌ Error: ' + result.detail, 'bg-red-600');
            }
        } catch (error) {
            showLinkedinStatus('❌ Network error: ' + error.message, 'bg-red-600');
        }
    });

    function showLinkedinStatus(message, bgClass) {
        const status = document.getElementById('searchStatus');
        const messageEl = document.getElementById('searchMessage');

        status.className = `mt-4 p-3 rounded text-white ${bgClass}`;
        messageEl.textContent = message;
        status.classList.remove('hidden');

        if (bgClass.includes('green')) {
            setTimeout(() => {
                status.classList.add('hidden');
            }, 3000);
        }
    }

</script>
