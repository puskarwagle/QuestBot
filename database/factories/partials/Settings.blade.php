<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-settings" class="peer hidden" />
    <label for="collapse-toggle-settings" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Settings Info Config
    </label>
    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form id="botConfigForm" class="space-y-4">
            <!-- LinkedIn Bot Settings -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">LinkedIn Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Close Tabs</label>
                        <select name="close_tabs" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Follow Companies</label>
                        <select name="follow_companies" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Runtime Behavior -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Runtime Behavior</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Run Non-Stop</label>
                        <select name="run_non_stop" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Alternate Sort</label>
                        <select name="alternate_sortby" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Cycle Date Posted</label>
                        <select name="cycle_date_posted" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Stop Cycle at 24hr</label>
                        <select name="stop_date_cycle_at_24hr" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Resume Generator -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Resume Generator</h3>
                <div>
                    <label class="block text-sm font-medium mb-1">Generated Resume Path</label>
                    <input type="text" name="generated_resume_path" placeholder="all resumes/" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                </div>
            </div>

            <!-- History & Logs -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Files & Logging</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">History File</label>
                        <input type="text" name="file_name" placeholder="all excels/all_applied_applications_history.csv" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Failed File</label>
                        <input type="text" name="failed_file_name" placeholder="all excels/all_failed_applications_history.csv" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Logs Folder</label>
                        <input type="text" name="logs_folder_path" placeholder="logs/" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                </div>
            </div>

            <!-- Execution Settings -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Execution Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Click Gap (seconds)</label>
                        <input type="number" name="click_gap" min="0" placeholder="0" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Run in Background</label>
                        <select name="run_in_background" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Performance Settings -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Performance & Browser</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Disable Extensions</label>
                        <select name="disable_extensions" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Safe Mode</label>
                        <select name="safe_mode" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Smooth Scroll</label>
                        <select name="smooth_scroll" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Keep Screen Awake</label>
                        <select name="keep_screen_awake" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="border-b border-gray-700 pb-4">
                <h3 class="text-lg font-semibold mb-4 text-yellow-400">Advanced Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Stealth Mode</label>
                        <select name="stealth_mode" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="False">False</option>
                            <option value="True">True</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Show AI Error Alerts</label>
                        <select name="showAiErrorAlerts" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500">
                            <option value="True">True</option>
                            <option value="False">False</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Update config.py
                </button>
            </div>
        </form>
        
        <!-- Status -->
        <div id="configUpdateStatus" class="mt-4 p-3 rounded hidden">
            <span id="configStatusMessage"></span>
        </div>
    </div>
</div>

<script>
    document.getElementById('botConfigForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());
        
        // Show loading
        showConfigStatus('Updating config.py...', 'bg-yellow-600');
        
        try {
            const response = await fetch('http://localhost:8001/api/update-config', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (response.ok) {
                showConfigStatus('✅ config.py updated successfully!', 'bg-green-600');
            } else {
                showConfigStatus('❌ Error: ' + result.detail, 'bg-red-600');
            }
        } catch (error) {
            showConfigStatus('❌ Network error: ' + error.message, 'bg-red-600');
        }
    });
    
    function showConfigStatus(message, bgClass) {
        const status = document.getElementById('configUpdateStatus');
        const messageEl = document.getElementById('configStatusMessage');
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