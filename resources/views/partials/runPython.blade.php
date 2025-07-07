<x-layouts.app>
    <div class="bg-base-200 min-h-screen flex items-center justify-center p-4">
        <div class="card bg-base-100 shadow-2xl w-full max-w-md">
            <div class="card-body">
                <h2 class="card-title justify-center text-2xl font-bold mb-6">
                    <span class="text-primary">🤖</span> Bot Controller
                </h2>

                <div class="grid grid-cols-1 gap-4">
                    <button id="startBot" class="btn btn-success gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 5v10l8-5-8-5z" />
                        </svg>
                        Start Bot
                    </button>

                    <button id="checkBot" class="btn btn-info gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        Check Status
                    </button>

                    <button id="stopBot" class="btn btn-error gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z" clip-rule="evenodd" />
                        </svg>
                        Stop Bot
                    </button>
                </div>

                <div id="botStatusMsg" class="alert mt-6 hidden">
                    <div class="flex items-center gap-2">
                        <span id="statusIcon"></span>
                        <span id="statusText"></span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            async function callBotApi(method, url, statusMsg, button) {
                // Add loading state
                button.classList.add('loading');
                button.disabled = true;

                try {
                    const res = await fetch(url, {
                        method
                    });
                    const data = await res.json().catch(() => ({}));
                    const msg = data.detail || JSON.stringify(data) || 'No response';

                    showStatus(`${statusMsg}: ${msg}`, 'alert-success', '✅');
                } catch (err) {
                    showStatus(`${statusMsg} failed: ${err.message}`, 'alert-error', '❌');
                } finally {
                    // Remove loading state
                    button.classList.remove('loading');
                    button.disabled = false;
                }
            }

            function showStatus(message, alertClass, icon) {
                const statusEl = document.getElementById('botStatusMsg');
                const statusIcon = document.getElementById('statusIcon');
                const statusText = document.getElementById('statusText');

                statusEl.className = `alert mt-6 ${alertClass}`;
                statusIcon.textContent = icon;
                statusText.textContent = message;
                statusEl.classList.remove('hidden');

                // Auto-hide after 5 seconds
                setTimeout(() => {
                    statusEl.classList.add('hidden');
                }, 5000);
            }

            // Event listeners
            document.getElementById('startBot').onclick = (e) =>
                callBotApi('POST', 'http://localhost:8001/api/run-bot', 'Bot Started', e.target);

            document.getElementById('checkBot').onclick = (e) =>
                callBotApi('GET', 'http://localhost:8001/api/bot-status', 'Bot Status', e.target);

            document.getElementById('stopBot').onclick = (e) =>
                callBotApi('POST', 'http://localhost:8001/api/stop-bot', 'Bot Stopped', e.target);

        </script>
    </div>
</x-layouts.app>
