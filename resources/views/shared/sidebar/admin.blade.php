<aside id="sidebar" class="fixed z-40 left-0 top-0 h-screen w-16 border-r border-gray-200 bg-amber-50 shadow-md transition-all duration-300 ease-in-out md:w-60 lg:w-[16rem]">
    <nav class="mt-20 flex flex-col gap-6 px-6 py-4 text-gray-600">
        @php
            $sidebar_items = [
                [
                    "ikon" => "fas fa-tachometer-alt",
                    "warna" => "text-orange-500",
                    "label" => "Dashboard",
                    "route" => route('admin.dashboard'),
                ],
                [
                    "ikon" => "fas fa-users",
                    "warna" => "text-blue-500",
                    "label" => "Pengguna",
                    "route" => route('admin.users.index'),
                ],
                [
                    "ikon" => "fas fa-book",
                    "warna" => "text-pink-500",
                    "label" => "Materi",
                    "route" => route('admin.materials.index'),
                ],
                [
                    "ikon" => "fas fa-tasks",
                    "warna" => "text-green-500",
                    "label" => "Latihan Soal",
                    "route" => route('admin.exercises.index'),
                ],
                [
                    "ikon" => "fas fa-chart-bar",
                    "warna" => "text-amber-500",
                    "label" => "Laporan",
                    "route" => route('admin.reports.index'),
                ]
            ];
        @endphp
        <ul class="space-y-6">
            @foreach ($sidebar_items as $item)
                <li class="flex items-center justify-between mb-2">
                    <a href="{{ $item['route'] }}" class="inline-flex items-center gap-3 hover:translate-x-3 transition-all duration-300 ease-in-out">
                        <i class="{{ $item['ikon'] }} {{ $item['warna'] }} w-8 text-2xl" aria-hidden="true"></i>
                        <span class="group hidden text-lg font-semibold transition-all duration-300 ease-in-out md:block">
                            <h5 class="lg:bg-gradient-to-r lg:from-{{ strtolower(str_replace('text-', '', $item['warna'])) }} lg:to-{{ strtolower(str_replace('text-', '', $item['warna'])) }} lg:bg-[length:0%_0.125rem] lg:bg-left-bottom lg:bg-no-repeat lg:transition-all lg:duration-500 lg:ease-out lg:group-hover:bg-[length:100%_0.125rem]">
                                {{ $item['label'] }}
                            </h5>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>