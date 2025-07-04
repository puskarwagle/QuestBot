<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-questions" class="peer hidden" />

    <label for="collapse-toggle-questions" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Questions Info Config
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form id="questionsForm" class="space-y-4">
            <!-- Resume Path -->
            <div>
                <label class="block text-sm font-medium mb-1">Default Resume Path</label>
                <input type="text" name="default_resume_path" placeholder="e.g., all resumes/default/resume.pdf" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Years of Experience -->
            <div>
                <label class="block text-sm font-medium mb-1">Years of Experience</label>
                <input type="number" name="years_of_experience" placeholder="e.g., 5" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Visa Sponsorship -->
            <div>
                <label class="block text-sm font-medium mb-1">Require Visa Sponsorship?</label>
                <select name="require_visa" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    <option value="">-- Select --</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <!-- Website -->
            <div>
                <label class="block text-sm font-medium mb-1">Portfolio Website</label>
                <input type="text" name="website" placeholder="e.g., https://www.example.bio" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- LinkedIn -->
            <div>
                <label class="block text-sm font-medium mb-1">LinkedIn Profile</label>
                <input type="text" name="linkedIn" placeholder="e.g., https://www.linkedin.com/in/example" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Citizenship -->
            <div>
                <label class="block text-sm font-medium mb-1">Citizenship Status</label>
                <select name="us_citizenship" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    <option value="">-- Select --</option>
                    <option value="U.S. Citizen/Permanent Resident">U.S. Citizen/Permanent Resident</option>
                    <option value="Non-citizen allowed to work for any employer">Non-citizen allowed to work for any employer</option>
                    <option value="Non-citizen allowed to work for current employer">Non-citizen allowed to work for current employer</option>
                    <option value="Non-citizen seeking work authorization">Non-citizen seeking work authorization</option>
                    <option value="Canadian Citizen/Permanent Resident">Canadian Citizen/Permanent Resident</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Salary Inputs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desired Salary</label>
                    <input type="number" name="desired_salary" placeholder="e.g., 1200000" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current CTC</label>
                    <input type="number" name="current_ctc" placeholder="e.g., 800000" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- Notice Period -->
            <div>
                <label class="block text-sm font-medium mb-1">Notice Period (days)</label>
                <input type="number" name="notice_period" placeholder="e.g., 30" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Headline -->
            <div>
                <label class="block text-sm font-medium mb-1">LinkedIn Headline</label>
                <input type="text" name="linkedin_headline" placeholder="e.g., Full Stack Developer..." class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Summary -->
            <div>
                <label class="block text-sm font-medium mb-1">LinkedIn Summary</label>
                <textarea name="linkedin_summary" placeholder="Triple-quoted summary..." rows="4" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
            </div>

            <!-- Cover Letter -->
            <div>
                <label class="block text-sm font-medium mb-1">Cover Letter</label>
                <textarea name="cover_letter" placeholder="Triple-quoted cover letter..." rows="4" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
            </div>

            <!-- All User Info -->
            <div>
                <label class="block text-sm font-medium mb-1">User Information All</label>
                <textarea name="user_information_all" placeholder="Triple-quoted info..." rows="4" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500"></textarea>
            </div>

            <!-- Recent Employer -->
            <div>
                <label class="block text-sm font-medium mb-1">Most Recent Employer</label>
                <input type="text" name="recent_employer" placeholder="e.g., Google, Not Applicable" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Confidence -->
            <div>
                <label class="block text-sm font-medium mb-1">Confidence (1-10)</label>
                <input type="text" name="confidence_level" placeholder="e.g., 8" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
            </div>

            <!-- Behavior Toggles -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Pause Before Submit?</label>
                    <select name="pause_before_submit" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="True">True</option>
                        <option value="False">False</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Pause at Failed Question?</label>
                    <select name="pause_at_failed_question" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="True">True</option>
                        <option value="False">False</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Overwrite Previous Answers?</label>
                    <select name="overwrite_previous_answers" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                        <option value="True">True</option>
                        <option value="False">False</option>
                    </select>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Update questions.py
                </button>
            </div>
        </form>
        <!-- Status -->
        <div id="questionsStatus" class="mt-4 p-3 rounded hidden">
            <span id="questionsMessage"></span>
        </div>
    </div>
</div>

<script>
    document.getElementById('questionsForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        showQuestionsStatus('Updating questions.py...', 'bg-yellow-600');

        try {
            const response = await fetch('http://localhost:8001/api/update-questions', {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                }
                , body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showQuestionsStatus('✅ questions.py updated successfully!', 'bg-green-600');
            } else {
                showQuestionsStatus('❌ Error: ' + result.detail, 'bg-red-600');
            }
        } catch (error) {
            showQuestionsStatus('❌ Network error: ' + error.message, 'bg-red-600');
        }
    });

    function showQuestionsStatus(message, bgClass) {
        const status = document.getElementById('questionsStatus');
        const messageEl = document.getElementById('questionsMessage');

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
