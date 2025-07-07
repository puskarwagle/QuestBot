<div class="container mx-auto p-8 max-w-4xl">
    <div class="p-6 space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-bold text-primary mb-1">QuestBot WebSocket Test</h1>
            <p class="text-secondary">Laravel ↔ FastAPI Communication Test</p>
        </div>

        <!-- Connection Status -->
        <div class="alert alert-info shadow-lg" id="status-panel">
            <div class="flex items-center gap-3">
                <span class="badge badge-xs badge-error" id="status-indicator"></span>
                <span id="status-text" class="font-medium">Disconnected</span>
            </div>
        </div>

        <!-- Messages -->
        <div>
            <h2 class="text-xl font-semibold text-primary mb-2">Messages</h2>
            <div id="messages" class="bg-base-200 h-64 overflow-y-auto rounded-box p-4 space-y-2 text-sm font-mono border border-base-content/10">
                <div class="text-secondary-content">Connecting to WebSocket...</div>
            </div>
        </div>

        <!-- Input + Controls -->
        <div class="space-y-4">
            <div class="join w-full">
                <input id="messageInput" type="text" placeholder="Type a message..." class="input input-bordered join-item w-full" onkeypress="if(event.key==='Enter') sendMessage()" />
                <button onclick="sendMessage()" class="btn btn-success join-item" id="sendBtn">Send</button>
            </div>

            <div class="flex flex-wrap gap-2">
                <button onclick="sendQuickMessage('hello gui')" class="btn btn-info">Send "hello gui"</button>
                <button onclick="clearMessages()" class="btn btn-warning">Clear</button>
                <button onclick="toggleConnection()" class="btn btn-error" id="toggleBtn">Disconnect</button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
            <div class="stats shadow">
                <div class="stat bg-base-200 rounded">
                    <div class="stat-title text-secondary">Messages</div>
                    <div class="stat-value text-primary" id="messageCount">0</div>
                </div>
            </div>
            <div class="stats shadow">
                <div class="stat bg-base-200 rounded">
                    <div class="stat-title text-secondary">Connected</div>
                    <div class="stat-value text-primary" id="connectionTime">0s</div>
                </div>
            </div>
            <div class="stats shadow">
                <div class="stat bg-base-200 rounded">
                    <div class="stat-title text-secondary">Latency (ms)</div>
                    <div class="stat-value text-primary" id="latency">--</div>
                </div>
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
</div>
