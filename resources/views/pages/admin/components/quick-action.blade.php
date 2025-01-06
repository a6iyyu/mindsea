<main class="container mx-auto p-6 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Aksi Cepat</h2>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $actions = [
                [
                    "title" => "Tambah Materi",
                    "description" => "Buat materi pembelajaran baru",
                    "icon" => "fa-book-medical",
                    "color" => "blue",
                    "route" => "admin.materials.index"
                ],
                [
                    "title" => "Kelola Materi",
                    "description" => "Atur materi yang sudah ada",
                    "icon" => "fa-book",
                    "color" => "green",
                    "route" => "admin.materials.index"
                ],
                /**[
                    "title" => "Tambah Latihan",
                    "description" => "Buat soal latihan baru",
                    "icon" => "fa-file-circle-plus",
                    "color" => "purple",
                    "route" => ""
                ],
                [
                    "title" => "Kelola Latihan",
                    "description" => "Atur soal latihan yang ada",
                    "icon" => "fa-file-pen",
                    "color" => "orange",
                    "route" => ""
                ]
                **/
            ];
        @endphp

        @foreach($actions as $action)
            <article
                class="bg-white p-6 rounded-xl border-l-4 border-{{ $action['color'] }}-500 shadow-md hover:shadow-lg transition-all group">
                <a href="{{ route($action['route']) }}" class="block">
                    <header class="flex items-center justify-between mb-4">
                        <div class="bg-{{ $action['color'] }}-100 p-3 rounded-lg">
                            <i class="fas {{ $action['icon'] }} text-{{ $action['color'] }}-500 text-xl"></i>
                        </div>
                        <i
                            class="fas fa-arrow-right text-{{ $action['color'] }}-500 transform translate-x-0 group-hover:translate-x-2 transition-transform"></i>
                    </header>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $action['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $action['description'] }}</p>
                    </div>
                </a>
            </article>
        @endforeach
    </section>
</main>