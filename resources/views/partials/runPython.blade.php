<div class="p-4 bg-gray-900 rounded-lg border border-gray-700 text-green-300 space-y-4">
    <div class="flex flex-wrap gap-4 justify-center">
        <button id="startBot" class="btn btn-success">▶️ Start Bot</button>
        <button id="checkBot" class="btn btn-info">🔍 Check Status</button>
        <button id="stopBot" class="btn btn-error">⛔ Stop Bot</button>
    </div>
    <div id="botStatusMsg" class="mt-4 text-center hidden"></div>

    <script>
        async function callBotApi(method, url, statusMsg) {
            try {
                const res = await fetch(url, { method });
                const data = await res.json().catch(() => ({}));
                const msg = data.detail || JSON.stringify(data) || 'No response';
                showStatus(`${statusMsg}: ${msg}`, 'text-green-400');
            } catch (err) {
                showStatus(`❌ ${statusMsg} failed: ${err.message}`, 'text-red-400');
            }
        }

        function showStatus(message, colorClass) {
            const el = document.getElementById('botStatusMsg');
            el.textContent = message;
            el.className = `mt-4 text-center ${colorClass}`;
            el.classList.remove('hidden');
        }

        document.getElementById('startBot').onclick = () =>
            callBotApi('POST', 'http://localhost:8001/api/run-bot', '✅ Bot Started');

        document.getElementById('checkBot').onclick = () =>
            callBotApi('GET', 'http://localhost:8001/api/bot-status', '📊 Bot Status');

        document.getElementById('stopBot').onclick = () =>
            callBotApi('POST', 'http://localhost:8001/api/stop-bot', '🛑 Bot Stopped');
    </script>
</div>
