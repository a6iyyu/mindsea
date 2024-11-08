<header class="fixed left-0 top-0 z-50 h-[4.5rem] w-screen border-b-2 border-gray-200 bg-[#fceede] shadow-md">
    <section class="mx-auto flex h-full max-w-[90vw] items-center justify-between lg:max-w-[96vw]">
        <div class="flex items-center gap-3 lg:gap-6">
            <button class="focus:outline-none" aria-label="Menu">
                <i
                    class="fa-solid fa-bars cursor-pointer text-lg text-orange-500 transition-colors hover:text-[#f58a66] lg:text-2xl"></i>
            </button>
            <a href="/"
                class="flex flex-col text-xl font-bold leading-none text-[#3b3b3b] lg:text-2xl lg:leading-tight">
                <span class="tracking-wide">mind</span>
                <span class="tracking-wider text-[#f58a66]">sea</span>
            </a>
        </div>
        <div class="relative hidden lg:block">
            <input type="text"
                class="font-plus-jakarta-sans h-full w-[35rem] rounded-lg border-2 py-3 pl-4 pr-12 text-base transition-colors focus:border-[#f58a66] focus:outline-none"
                placeholder="Cari Materi Yuk..." aria-label="Cari Materi Yuk..." />
            <button class="absolute right-4 top-1/2 -translate-y-1/2 focus:outline-none" aria-label="Cari">
                <i class="fa-solid fa-magnifying-glass text-gray-500 transition-colors hover:text-[#f58a66]"></i>
            </button>
        </div>
        <nav class="flex h-[80%] items-center gap-4">
            <a href="#" class="mr-4 hidden w-full flex-col items-center justify-center sm:inline-flex lg:hidden"
                aria-label="Cari">
                <i
                    class="fa-solid fa-magnifying-glass text-2xl text-gray-600 transition-colors hover:text-[#f58a66]"></i>
            </a>
            @php
                $nav_items = [
                    ["icon" => "fa-solid fa-bell", "color" => "text-blue-500", "label" => "Notifikasi"],
                    ["icon" => "fa-solid fa-comments", "color" => "text-green-500", "label" => "Chatbot"],
                    ["icon" => "fa-solid fa-headset", "color" => "text-purple-500", "label" => "Dukungan"],
                ];
            @endphp
            @foreach ($nav_items as $item)
                <a href="{{ strtolower(str_replace(" ", "", $item["label"])) }}"
                    class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                    aria-label="{{ $item["label"] }}">
                    <i class="{{ $item["icon"] }} {{ $item["color"] }} mr-4 text-2xl lg:mr-0"></i>
                    <h5 class="mt-1 hidden text-sm font-medium text-gray-600 lg:block">
                        {{ $item["label"] }}
                    </h5>
                </a>
            @endforeach
            <a href="/masuk" class="inline-flex w-full flex-col items-center justify-center focus:outline-none"
                aria-label="Profil Pengguna">
                <i class="fa-solid fa-user mr-4 text-2xl lg:mr-0"></i>
                <h5 class="font-plus-jakarta-sans mt-1 hidden text-sm font-medium text-gray-600 lg:block">
                    Masuk
                </h5>
            </a>
        </nav>
    </section>
</header>