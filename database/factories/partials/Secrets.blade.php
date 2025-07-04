<div class="collapse collapse-arrow border border-gray-700 rounded bg-gray-900 mb-4">
    <input type="checkbox" id="collapse-toggle-secrets" class="peer hidden" />

    <label for="collapse-toggle-secrets" class="collapse-title text-xl font-bold text-green-400 cursor-pointer text-center peer-checked:text-green-300">
        Secrets Info Config
    </label>

    <div class="collapse-content text-green-300 hidden peer-checked:flex flex-col">
        <form id="toolConfigForm" class="space-y-4">

            <!-- LinkedIn Login -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">LinkedIn Username</label>
                    <input type="email" name="username" placeholder="e.g., john@example.com" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">LinkedIn Password</label>
                    <input type="password" name="password" placeholder="Your password" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
            </div>

            <!-- Use AI -->
            <div>
                <label class="block text-sm font-medium mb-1">Use AI?</label>
                <select name="use_AI" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400">
                    <option value="False">False</option>
                    <option value="True">True</option>
                </select>
            </div>

            <!-- AI Provider -->
            <div>
                <label class="block text-sm font-medium mb-1">AI Provider</label>
                <select name="ai_provider" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400">
                    <option value="deepseek">deepseek</option>
                    <option value="openai">openai</option>
                </select>
            </div>

            <!-- DeepSeek Config -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">DeepSeek API URL</label>
                    <input type="text" name="deepseek_api_url" placeholder="https://api.deepseek.com" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">DeepSeek API Key</label>
                    <input type="text" name="deepseek_api_key" placeholder="Your DeepSeek Key" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">DeepSeek Model</label>
                    <select name="deepseek_model" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400">
                        <option value="deepseek-chat">deepseek-chat</option>
                        <option value="deepseek-reasoner">deepseek-reasoner</option>
                    </select>
                </div>
            </div>

            <!-- Local LLM Config -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">LLM API URL</label>
                    <input type="text" name="llm_api_url" placeholder="https://api.openai.com/v1/" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">LLM API Key</label>
                    <input type="text" name="llm_api_key" placeholder="Your OpenAI API Key" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">LLM Model</label>
                    <input type="text" name="llm_model" placeholder="e.g., gpt-4o" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400 font-mono">
                </div>
            </div>

            <!-- LLM Spec -->
            <div>
                <label class="block text-sm font-medium mb-1">LLM Spec</label>
                <select name="llm_spec" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400">
                    <option value="openai">openai</option>
                    <option value="openai-like">openai-like</option>
                    <option value="openai-like-github">openai-like-github</option>
                    <option value="openai-like-mistral">openai-like-mistral</option>
                </select>
            </div>

            <!-- Stream Output -->
            <div>
                <label class="block text-sm font-medium mb-1">Stream AI Output?</label>
                <select name="stream_output" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-green-400">
                    <option value="False">False</option>
                    <option value="True">True</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-700">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded transition-colors duration-200">
                    Update secrets.py
                </button>
            </div>
        </form>
        <!-- Status -->
        <div id="secretsStatus" class="mt-4 p-3 rounded hidden">
            <span id="secretsMessage"></span>
        </div>
    </div>
</div>
<script>
    document.getElementById('toolConfigForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        showToolStatus('Updating secrets.py...', 'bg-yellow-600');

        try {
            const response = await fetch('http://localhost:8001/api/update-secrets', {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                }
                , body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showToolStatus('✅ secrets.py updated successfully!', 'bg-green-600');
            } else {
                showToolStatus('❌ Error: ' + result.detail, 'bg-red-600');
            }
        } catch (error) {
            showToolStatus('❌ Network error: ' + error.message, 'bg-red-600');
        }
    });

    function showToolStatus(message, bgClass) {
        const status = document.getElementById('secretsStatus');
        const messageEl = document.getElementById('secretsMessage');

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
