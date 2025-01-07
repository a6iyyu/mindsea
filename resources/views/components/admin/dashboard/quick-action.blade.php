<main class="container mx-auto p-6 shadow-md rounded-lg">
    <h2 class="text-lg font-bold text-gray-800 mb-6 lg:text-2xl">Aksi Cepat</h2>
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
            <figure class="bg-white p-6 rounded-xl border-l-4 border-{{ $action['color'] }}-500 shadow-md hover:shadow-lg transition-all group">
                <a href="{{ route($action['route']) }}">
                    <header class="flex items-center justify-between mb-4">
                        <i class="fas {{ $action['icon'] }} text-{{ $action['color'] }}-500 text-xl bg-{{ $action['color'] }}-100 p-3 rounded-lg"></i>
                        <i class="fas fa-arrow-right text-{{ $action['color'] }}-500 transform translate-x-0 group-hover:translate-x-2 transition-transform"></i>
                    </header>
                    <figcaption>
                        <h3 class="text-base font-semibold text-gray-800 mb-1 lg:text-lg">{{ $action['title'] }}</h3>
                        <h6 class="text-sm text-gray-600">{{ $action['description'] }}</h6>
                    </figcaption>
                </a>
            </figure>
        @endforeach
    </section>
</main>