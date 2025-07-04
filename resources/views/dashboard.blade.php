<x-app-layout>
    <div class="gap-5">
        <livewire:personal-info-cunt /> 
        <livewire:question-info-cunt /> 
        <livewire:search-info-cunt />
        <livewire:secret-info-cunt />
        <livewire:bot-config-cunt />
    </div>
    
    <div class="container mx-auto p-8 max-w-4xl">
        <div class="mb-8">
            <h1 class="text-3xl text-white font-bold mb-2">Job Applier WebSocket Test</h1>
            <p class="text-pink-400">Laravel ↔ FastAPI Communication Test</p>
        </div>

        <!-- Connection Status -->
        <div class="mb-6 p-4 rounded-lg border" id="status-panel">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" id="status-indicator"></div>
                <span id="status-text" class="text-white">Disconnected</span>
            </div>
        </div>

        <!-- Messages Container -->
        <div class="mb-6">
            <h2 class="text-xl text-white mb-4">Messages</h2>
            <div id="messages" class="bg-black p-4 rounded-lg h-64 overflow-y-auto border border-pink-700 font-mono text-sm">
                <div class="text-pink-500">Connecting to WebSocket...</div>
            </div>
        </div>

        <!-- Controls -->
        <div class="space-y-4">
            <div class="flex gap-2">
                <input type="text" id="messageInput" placeholder="Type a message..." class="flex-1 bg-gray-800 border border-pink-600 rounded px-3 py-2 text-green-400 focus:outline-none focus:border-green-500" onkeypress="if(event.key==='Enter') sendMessage()">
                <button onclick="sendMessage()" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded transition-colors" id="sendBtn">
                    Send
                </button>
            </div>

            <div class="flex gap-2">
                <button onclick="sendQuickMessage('hello gui')" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded transition-colors">
                    Send "hello gui"
                </button>
                <button onclick="clearMessages()" class="bg-orange-600 hover:bg-red-700 px-4 py-2 rounded transition-colors">
                    Clear
                </button>
                <button onclick="toggleConnection()" class="bg-red-600 hover:bg-gray-700 px-4 py-2 rounded transition-colors" id="toggleBtn">
                    Disconnect
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="mt-8 grid grid-cols-3 gap-4 text-center">
            <div class="bg-gray-800 p-4 rounded">
                <div class="text-2xl text-white font-bold" id="messageCount">0</div>
                <div class="text-pink-400">Messages</div>
            </div>
            <div class="bg-gray-800 p-4 rounded">
                <div class="text-2xl font-bold text-white" id="connectionTime">0s</div>
                <div class="text-pink-400">Connected</div>
            </div>
            <div class="bg-gray-800 p-4 rounded">
                <div class="text-2xl font-bold text-white" id="latency">--</div>
                <div class="text-pink-400">Latency (ms)</div>
            </div>
        </div>
    </div>

    <script>
        let ws = null;
        let messageCount = 0;
        let connectionStartTime = null;
        let connectionTimer = null;

        // WebSocket connection
        function connect() {
            try {
                ws = new WebSocket('ws://localhost:8001/ws');

                ws.onopen = function(event) {
                    console.log('Connected to WebSocket');
                    updateStatus('Connected', 'bg-green-500');
                    addMessage('system', 'Connected to FastAPI server');
                    connectionStartTime = Date.now();
                    startConnectionTimer();
                    document.getElementById('toggleBtn').textContent = 'Disconnect';
                };

                ws.onmessage = function(event) {
                    const data = JSON.parse(event.data);
                    console.log('Received:', data);

                    let messageType = data.type || 'message';
                    let displayMessage = data.message || data.server_response || JSON.stringify(data);

                    addMessage('server', displayMessage, messageType);
                    messageCount++;
                    document.getElementById('messageCount').textContent = messageCount;
                };

                ws.onclose = function(event) {
                    console.log('WebSocket closed');
                    updateStatus('Disconnected', 'bg-red-500');
                    addMessage('system', 'Disconnected from server');
                    stopConnectionTimer();
                    document.getElementById('toggleBtn').textContent = 'Connect';
                };

                ws.onerror = function(error) {
                    console.error('WebSocket error:', error);
                    updateStatus('Error', 'bg-red-500');
                    addMessage('error', 'Connection error occurred');
                };

            } catch (error) {
                console.error('Failed to connect:', error);
                updateStatus('Failed to connect', 'bg-red-500');
            }
        }

        function disconnect() {
            if (ws) {
                ws.close();
                ws = null;
            }
        }

        function toggleConnection() {
            if (!ws || ws.readyState === WebSocket.CLOSED) {
                connect();
            } else {
                disconnect();
            }
        }

        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value.trim();

            if (message && ws && ws.readyState === WebSocket.OPEN) {
                const messageData = {
                    message: message
                    , timestamp: Date.now()
                    , type: 'user_message'
                };

                ws.send(JSON.stringify(messageData));
                addMessage('client', message);
                input.value = '';
            }
        }

        function sendQuickMessage(msg) {
            if (ws && ws.readyState === WebSocket.OPEN) {
                const messageData = {
                    message: msg
                    , timestamp: Date.now()
                    , type: 'quick_message'
                };

                ws.send(JSON.stringify(messageData));
                addMessage('client', msg);
            }
        }

        function addMessage(sender, message, type = 'normal') {
            const messagesDiv = document.getElementById('messages');
            const timestamp = new Date().toLocaleTimeString();

            let senderClass = '';
            let prefix = '';

            switch (sender) {
                case 'client':
                    senderClass = 'text-blue-400';
                    prefix = '→ YOU:';
                    break;
                case 'server':
                    senderClass = type === 'greeting' ? 'text-green-300' : 'text-yellow-400';
                    prefix = '← SERVER:';
                    break;
                case 'system':
                    senderClass = 'text-pink-400';
                    prefix = '⚡ SYS:';
                    break;
                case 'error':
                    senderClass = 'text-red-400';
                    prefix = '❌ ERR:';
                    break;
            }

            const messageElement = document.createElement('div');
            messageElement.className = `mb-1 ${senderClass}`;
            messageElement.innerHTML = `<span class="text-pink-500">[${timestamp}]</span> <span class="font-semibold">${prefix}</span> ${message}`;

            messagesDiv.appendChild(messageElement);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }

        function clearMessages() {
            document.getElementById('messages').innerHTML = '';
            messageCount = 0;
            document.getElementById('messageCount').textContent = '0';
        }

        function updateStatus(text, indicatorClass) {
            document.getElementById('status-text').textContent = text;
            const indicator = document.getElementById('status-indicator');
            indicator.className = `w-3 h-3 rounded-full ${indicatorClass}`;
        }

        function startConnectionTimer() {
            connectionTimer = setInterval(() => {
                if (connectionStartTime) {
                    const elapsed = Math.floor((Date.now() - connectionStartTime) / 1000);
                    document.getElementById('connectionTime').textContent = elapsed + 's';
                }
            }, 1000);
        }

        function stopConnectionTimer() {
            if (connectionTimer) {
                clearInterval(connectionTimer);
                connectionTimer = null;
            }
            document.getElementById('connectionTime').textContent = '0s';
        }

        // Auto-connect on page load
        window.onload = function() {
            connect();
        };

        // Cleanup on page unload
        window.onbeforeunload = function() {
            if (ws) {
                ws.close();
            }
        };

    </script>
</x-app-layout>
