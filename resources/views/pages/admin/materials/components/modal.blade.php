<div id="{{ $id }}" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>

    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-2xl rounded-xl bg-white p-8 shadow-lg">
                <div class="mb-6 flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $title }}</h3>
                    <button onclick="close_modal('{{ $id }}')" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</div>