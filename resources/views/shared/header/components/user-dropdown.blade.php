<nav class="relative group">
    <button class="flex flex-col items-center gap-[0.20rem] hover:text-[#f58a66] transition-colors"
        aria-label="Menu Profil">
        <i class="fa-solid fa-circle-user text-[#f58a66] text-2xl"></i>
        <div class="hidden lg:block">
            @php
                $firstName = explode(' ', Auth::user()->name)[0];
            @endphp
            <h5 class="text-sm font-medium text-gray-600">
                {{ $firstName }}
            </h5>
        </div>
    </button>

    <menu class="absolute right-0 w-64 bg-white rounded-xl shadow-lg border-2 border-[#f58a66]/20 hidden group-hover:block">
        <header class="px-4 py-3 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <span class="bg-[#fceede] p-2 rounded-lg">
                    <i class="fa-solid fa-circle-user text-[#f58a66] text-xl"></i>
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </header>

        <section class="py-2">
            <nav>
                <ul>
                    <li>
                        <a href="/profil"
                            class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-[#fceede]/30 transition-colors">
                            <i class="fa-solid fa-user text-[#f58a66]"></i>
                            Profil
                        </a>
                    </li>
                    @if (Auth::user()->is_admin)
                    <li>
                        <a href="/admin"
                            class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-[#fceede]/30 transition-colors">
                            <i class="fa-solid fa-gear text-[#f58a66]"></i>
                            Admin
                        </a>
                    </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-3 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <i class="fa-solid fa-right-from-bracket text-red-600"></i>
                                Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </section>
    </menu>
</nav>