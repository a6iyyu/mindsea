<div class="relative inline-flex items-center">
    <a href="{{ route('notifikasi.index') }}" class="text-gray-600 hover:text-gray-800">
        <i class="fas fa-bell text-xl"></i>
        <span id="notification-badge" 
              class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full h-4 w-4 flex items-center justify-center text-xs"
              style="display: none;">
            0
        </span>
    </a>
</div>

<script>
function updateNotificationCount() {
    fetch('/notifikasi/unread-count')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('notification-badge');
            if (data.count > 0) {
                badge.textContent = data.count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        });
}

updateNotificationCount();

setInterval(updateNotificationCount, 30000);

document.addEventListener('notification-received', updateNotificationCount);
</script>
