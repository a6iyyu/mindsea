<dialog id="{{ $id }}" class="fixed inset-0 z-50 hidden">
    <section class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></section>
    <section class="fixed inset-0 z-50 overflow-y-auto">
        <div class="relative w-full max-w-2xl rounded-xl bg-white p-12 shadow-lg flex min-h-full items-center justify-center">
            <article class="mb-6 flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-800">{{ $title }}</h3>
                <button
                    onclick="close_modal('{{ $id }}')"
                    class="fas fa-times text-xl text-gray-500 hover:text-gray-700"
                ></button>
            </article>
            {{ $slot }}
        </div>
    </section>
</dialog>