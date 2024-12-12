<section class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl border-4 border-[#f58a66]/20 shadow-lg p-6">
        <!-- Chat History -->
        <div id="chat-history" class="space-y-4 mb-6 h-[60vh] overflow-y-auto">
            <!-- Messages will be displayed here -->
        </div>

        <!-- Chat Input -->
        <form id="chat-form" class="relative">
            @csrf
            <textarea id="user-input" 
                class="w-full p-4 pr-16 border-2 border-gray-200 rounded-xl resize-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors"
                placeholder="Ketik pesanmu di sini..."
                rows="3"></textarea>
            
            <button type="submit" 
                class="absolute right-4 bottom-4 bg-[#f58a66] text-white p-3 rounded-lg hover:bg-[#f58a66]/90 transition-colors disabled:bg-gray-300"
                id="send-button">
                <i class="fa-solid fa-paper-plane" id="send-icon"></i>
                <i class="fa-solid fa-spinner fa-spin hidden" id="loading-icon"></i>
            </button>
        </form>
    </div>
</section>

<script>
const chatHistory = document.getElementById('chat-history');
const chatForm = document.getElementById('chat-form');
const userInput = document.getElementById('user-input');
const sendButton = document.getElementById('send-button');
const sendIcon = document.getElementById('send-icon');
const loadingIcon = document.getElementById('loading-icon');

let conversationHistory = [];

function setLoading(isLoading) {
    userInput.disabled = isLoading;
    sendButton.disabled = isLoading;
    sendIcon.classList.toggle('hidden', isLoading);
    loadingIcon.classList.toggle('hidden', !isLoading);
}

function addMessage(content, isUser = false, isError = false) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `flex ${isUser ? 'justify-end' : 'justify-start'}`;
    
    messageDiv.innerHTML = `
        <div class="max-w-[80%] ${isUser ? 'bg-[#f58a66]/10' : isError ? 'bg-red-50' : 'bg-gray-100'} rounded-xl p-4">
            <div class="flex items-center gap-3 mb-2">
                <span class="font-semibold ${isError ? 'text-red-600' : 'text-gray-800'}">
                    ${isUser ? 'Kamu' : 'AI Assistant'}
                </span>
            </div>
            <p class="${isError ? 'text-red-600' : 'text-gray-700'} whitespace-pre-wrap">${content}</p>
        </div>
    `;
    
    chatHistory.appendChild(messageDiv);
    chatHistory.scrollTop = chatHistory.scrollHeight;
}

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = userInput.value.trim();
    if (!message) return;

    setLoading(true);
    addMessage(message, true);
    
    try {
        const response = await fetch('/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                message,
                history: conversationHistory
            })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || 'Terjadi kesalahan. Silakan coba lagi.');
        }

        conversationHistory.push({
            role: "assistant",
            content: data.response
        });

        addMessage(data.response);

    } catch (error) {
        console.error('Error:', error);
        addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', false, true);
    } finally {
        userInput.value = '';
        setLoading(false);
        userInput.focus();
    }
});
</script>