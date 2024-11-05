<header
    class="fixed left-0 top-0 z-50 h-[4.5rem] w-screen border-b-2 border-gray-200 bg-[#fceede] shadow-md"
>
    <section
        class="mx-auto flex h-full max-w-[90vw] items-center justify-between lg:max-w-[96vw]"
    >
        <div class="flex items-center gap-3 lg:gap-6">
            <button class="focus:outline-none" aria-label="Menu">
                <i
                    class="fa-solid fa-bars cursor-pointer text-lg text-orange-500 transition-colors hover:text-[#f58a66] lg:text-2xl"
                ></i>
            </button>
            <h1
                class="font-playwrite flex flex-col text-xl font-bold leading-none text-[#3b3b3b] lg:text-2xl lg:leading-tight"
            >
                <span class="tracking-wide">mind</span>
                <span class="tracking-wider text-[#f58a66]">sea</span>
            </h1>
        </div>
        <div class="relative hidden lg:block">
            <input
                type="text"
                class="font-plus-jakarta-sans h-full w-[35rem] rounded-full border-2 py-3 pl-4 pr-12 text-base transition-colors focus:border-[#f58a66] focus:outline-none"
                placeholder="Cari Materi Yuk..."
                aria-label="Cari Materi"
            />
            <button
                class="absolute right-4 top-1/2 -translate-y-1/2 focus:outline-none"
                aria-label="Cari"
            >
                <i
                    class="fa-solid fa-magnifying-glass text-gray-500 transition-colors hover:text-[#f58a66]"
                ></i>
            </button>
        </div>
        <nav class="flex h-[80%] items-center gap-4">
            <a
                href="#"
                class="mr-4 hidden w-full flex-col items-center justify-center sm:inline-flex lg:hidden"
                aria-label="Cari"
            >
                <i
                    class="fa-solid fa-magnifying-glass text-2xl text-gray-600 transition-colors hover:text-[#f58a66]"
                ></i>
            </a>
            <a
                href="/notifikasi"
                class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                aria-label="Notifikasi"
            >
                <i
                    class="fa-solid fa-bell mr-4 text-2xl text-blue-500 lg:mr-0"
                ></i>
                <p
                    class="font-plus-jakarta-sans mt-1 hidden text-sm font-medium text-gray-600 lg:block"
                >
                    Notifikasi
                </p>
            </a>
            <a
                href="/chatbot"
                class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                aria-label="Chatbot"
            >
                <i
                    class="fa-solid fa-comments mr-4 text-2xl text-green-500 lg:mr-0"
                ></i>
                <p
                    class="font-plus-jakarta-sans mt-1 hidden text-sm font-medium text-gray-600 lg:block"
                >
                    Chatbot
                </p>
            </a>
            <a
                href="/dukungan"
                class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                aria-label="Dukungan"
            >
                <i
                    class="fa-solid fa-headset mr-4 text-2xl text-purple-500 lg:mr-0"
                ></i>
                <p
                    class="font-plus-jakarta-sans mt-1 hidden text-sm font-medium text-gray-600 lg:block"
                >
                    Dukungan
                </p>
            </a>
            <button
                class="inline-flex w-full flex-col items-center justify-center focus:outline-none"
                aria-label="Profil Pengguna"
            >
                <img
                    src="{{ asset("template.jpg") }}"
                    alt="Foto Profil"
                    class="h-[2.15rem] w-[2.15rem] rounded-full shadow-md transition-all hover:ring-2 hover:ring-[#f58a66]"
                />
                <p
                    class="font-plus-jakarta-sans mt-1 hidden text-sm font-medium text-gray-600 lg:block"
                >
                    Pram
                </p>
            </button>
        </nav>
    </section>
</header>
