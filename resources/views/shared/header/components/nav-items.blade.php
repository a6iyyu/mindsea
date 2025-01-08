@php
    $nav_items = [
        ["icon" => "fa-solid fa-bell", "color" => "text-blue-500", "label" => "Notifikasi", "path" => "/notifikasi"],
        ["icon" => "fa-solid fa-comments", "color" => "text-green-500", "label" => "Chatbot", "path" => "/chatbot"],
        ["icon" => "fa-solid fa-headset", "color" => "text-purple-500", "label" => "Dukungan", "path" => "/dukungan"],
    ];
@endphp

<nav>
    <ul class="flex items-center gap-4">
        @foreach ($nav_items as $item)
            <li>
                <a href="{{ $item['path'] }}"
                    class="relative hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                    aria-label="{{ $item['label'] }}">
                    <span class="icon">
                        <i class="{{ $item['icon'] }} {{ $item['color'] }} mr-4 text-2xl lg:mr-0"></i>
                        @if ($item['label'] == 'Notifikasi')
                            <span id="notification-badge" 
                                  class="absolute -top-0 -right-0 bg-red-500 text-white rounded-full h-5 w-5 flex items-center justify-center text-xs"
                                  style="display: none;">
                                0
                            </span>
                        @endif
                    </span>
                    <span class="label mt-1 hidden text-sm font-medium text-gray-600 lg:block">
                        {{ $item['label'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>

<script>
function updateNotificationCount() {
    if (!document.body.classList.contains('auth')) return;
    
    fetch('/notifikasi/unread-count')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const badge = document.getElementById('notification-badge');
            if (badge) {
                if (data.count > 0) {
                    badge.textContent = data.count;
                    badge.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                }
            }
        })
        .catch(error => {
            console.error('Error fetching notification count:', error);
            const badge = document.getElementById('notification-badge');
            if (badge) {
                badge.style.display = 'none';
            }
        });
}

if (document.body.classList.contains('auth')) {
    updateNotificationCount();
    setInterval(updateNotificationCount, 30000);
}

document.addEventListener('notification-received', updateNotificationCount);
</script>