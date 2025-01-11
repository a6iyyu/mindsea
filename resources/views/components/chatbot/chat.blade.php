<section class="bg-white rounded-xl border-4 border-[#f58a66]/20 shadow-lg p-6">
    <!-- Chat History -->
    <div id="chat-history" class="space-y-4 mb-6 h-[60vh] overflow-y-auto"></div>

    <!-- Chat Input -->
    <form id="chat-form" class="relative">
        @csrf
        <textarea
            id="user-input"
            class="w-full py-4 pl-4 pr-20 border-2 border-gray-200 rounded-xl resize-none focus:border-[#f58a66] focus:ring-2 focus:ring-[#f58a66]/20 transition-colors lg:pr-24"
            placeholder="Ketik pesanmu di sini..."
            rows="2"
        ></textarea>
        <button
            type="submit"
            class="absolute right-4 bottom-6 bg-[#f58a66] text-white px-5 py-3 rounded-lg hover:bg-[#f58a66]/90 transition-colors disabled:bg-gray-300"
            id="send-button"
        >
            <i class="fa-solid fa-paper-plane" id="send-icon"></i>
            <i class="fa-solid fa-spinner fa-spin hidden" id="loading-icon"></i>
        </button>
    </form>
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

        const listenButtonHtml = !isUser && !isError ? `
            <button 
                onclick="window.SpeakText(this.parentElement.querySelector('.typing-text').textContent)"
                class="mt-4 flex items-center gap-2 px-4 py-2 transform rounded-lg bg-amber-100 text-amber-700 hover:bg-amber-200 transition-colors hidden listen-button"
            >
                <i class="fas fa-volume-up"></i>
                <span>Dengarkan</span>
            </button>
        ` : '';

        const messageContent = `
            <div class="max-w-[80%] ${isUser ? 'bg-[#f58a66]/10' : isError ? 'bg-red-50' : 'bg-gray-100'} rounded-xl p-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="font-semibold ${isError ? 'text-red-600' : 'text-gray-800'}">
                        ${isUser ? 'Kamu' : 'Mindsea Assistant'}
                    </span>
                </div>
                <p class="${isError ? 'text-red-600' : 'text-gray-700'} whitespace-pre-wrap typing-text"></p>
                ${listenButtonHtml}
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

        if (!isUser && !isError) {
            const textElement = messageDiv.querySelector('.typing-text');
            const listenButton = messageDiv.querySelector('.listen-button');
            
            animateTyping(textElement, content, 30, () => {
                listenButton.classList.remove('hidden');
            });
        } else {
            messageDiv.querySelector('.typing-text').textContent = content;
        }

        chatHistory.scrollTop = chatHistory.scrollHeight;
    }

    function animateTyping(element, text, delay = 30, onComplete = null) {
        let index = 0;
        element.textContent = '';

        const typeNextChar = () => {
            if (index < text.length) {
                element.textContent = text.slice(0, index + 1) + '▋';
                index++;
                scrollToBottom();
                setTimeout(typeNextChar, delay);
            } else {
                element.textContent = text;
                scrollToBottom();
                if (onComplete) onComplete();
            }
        };

        typeNextChar();
    }

    function scrollToBottom() {
        const chatHistory = document.getElementById('chat-history');
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
            } else if (error.message.includes('Silakan login terlebih dahulu')) {
                errorMessage = 'Anda harus login untuk menggunakan chatbot. Silakan login dan coba lagi.';
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