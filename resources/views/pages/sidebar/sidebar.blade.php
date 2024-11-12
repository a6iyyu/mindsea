<aside
    class="fixed left-0 top-0 h-screen w-16 border-r border-gray-200 bg-amber-50 shadow-md transition-all duration-300 ease-in-out md:w-60 lg:w-[16rem]">
    <section class="mt-20 flex flex-col gap-6 p-4 text-gray-600">
        @php
            $sidebar_items = [
                ["ikon" => "fa-solid fa-home", "warna" => "text-orange-500", "label" => "Beranda"],
                ["ikon" => "fa-solid fa-swatchbook", "warna" => "text-blue-500", "label" => "Materi"],
                ["ikon" => "fa-solid fa-brain", "warna" => "text-pink-500", "label" => "Latihan Soal"],
                ["ikon" => "fa-solid fa-chart-line", "warna" => "text-green-500", "label" => "Progres Belajar"],
                ["ikon" => "fa-solid fa-book-open-reader", "warna" => "text-purple-500", "label" => "Preferensi"],
                ["ikon" => "fa-solid fa-user", "warna" => "text-amber-500", "label" => "Tentang Kami"],

            ];
        @endphp
        @foreach ($sidebar_items as $item)
            <div class="flex items-center justify-between">
                <a href="{{ $item['label'] === 'Beranda' ? '/' : strtolower(str_replace(" ", "-", $item["label"])) }}"
                    class="inline-flex items-center gap-3 hover:translate-x-3 transition-all duration-300 ease-in-out">
                    <i class="{{ $item["ikon"] }} {{ $item["warna"] }} text-2xl"></i>
                    <h3 class="group hidden text-lg font-semibold transition-all duration-300 ease-in-out md:block ">
                        <span
                            class="lg:bg-gradient-to-r lg:from-{{ strtolower(str_replace('text-', '', $item['warna'])) }} lg:to-{{ strtolower(str_replace('text-', '', $item['warna'])) }} lg:bg-[length:0%_0.125rem] lg:bg-left-bottom lg:bg-no-repeat lg:transition-all lg:duration-500 lg:ease-out lg:group-hover:bg-[length:100%_0.125rem]">
                            {{ $item["label"] }}
                        </span>
                    </h3>
                </a>
            </div>
        @endforeach
    </section>
</aside>