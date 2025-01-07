<div id="{{ $id }}" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>

    <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-xl bg-white p-6 shadow-xl">
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800">{{ $title }}</h3>
                <button onclick="closeModal('{{ $id }}')" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div> 