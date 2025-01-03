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
                class="absolute right-4 bottom-9 bg-[#f58a66] text-white p-3 rounded-lg hover:bg-[#f58a66]/90 transition-colors disabled:bg-gray-300"
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

function addMessage(content, isUser = false, isError = false, retryMessage = null) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `flex ${isUser ? 'justify-end' : 'justify-start'}`;
    
    const messageContent = `
        <div class="max-w-[80%] ${isUser ? 'bg-[#f58a66]/10' : isError ? 'bg-red-50' : 'bg-gray-100'} rounded-xl p-4">
            <div class="flex items-center gap-3 mb-2">
                <span class="font-semibold ${isError ? 'text-red-600' : 'text-gray-800'}">
                    ${isUser ? 'Kamu' : 'AI Assistant'}
                </span>
            </div>
            <p class="${isError ? 'text-red-600' : 'text-gray-700'} whitespace-pre-wrap">${content}</p>
            ${isError && retryMessage ? `
                <button 
                    onclick="retryMessage('${retryMessage}')" 
                    class="mt-2 flex items-center gap-2 text-red-600 hover:text-red-700">
                    <i class="fas fa-redo-alt"></i>
                    Coba Lagi
                </button>
            ` : ''}
        </div>
    `;
    
    messageDiv.innerHTML = messageContent;
    chatHistory.appendChild(messageDiv);
    chatHistory.scrollTop = chatHistory.scrollHeight;
}

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = userInput.value.trim();
    if (!message) return;

    const lastMessage = message;
    
    try {
        setLoading(true);
        addMessage(message, true);
        
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 30000); 

        const response = await fetch('/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                message,
                conversation_id: window.conversationId
            }),
            signal: controller.signal
        });

        clearTimeout(timeoutId);
        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || 'Terjadi kesalahan saat menghubungi AI. Silakan coba lagi.');
        }

        window.conversationId = data.conversation_id;
        addMessage(data.response);

    } catch (error) {
        console.error('Chat Error:', error);
        
        let errorMessage;
        if (error.name === 'AbortError') {
            errorMessage = 'Waktu permintaan habis. Silakan coba lagi.';
        } else {
            errorMessage = error.message.includes('API') 
                ? 'Maaf, layanan AI sedang tidak tersedia. Tim kami sedang menangani masalah ini.'
                : error.message;
        }
            
        addMessage(errorMessage, false, true, lastMessage);
        
    } finally {
        userInput.value = '';
        setLoading(false);
        userInput.focus();
    }
});

async function retryMessage(message) {
    userInput.value = message;
    await chatForm.dispatchEvent(new Event('submit'));
}
</script>