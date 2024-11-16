@php
    $nav_items = [
        ["icon" => "fa-solid fa-bell", "color" => "text-blue-500", "label" => "Notifikasi", "path" => "/notifikasi"],
        ["icon" => "fa-solid fa-comments", "color" => "text-green-500", "label" => "Chatbot", "path" => "/chatbot"],
        ["icon" => "fa-solid fa-headset", "color" => "text-purple-500", "label" => "Dukungan", "path" => "/dukungan"],
    ];
@endphp

<nav>
    <ul class="flex items-center gap-4">
        @foreach ($nav_items as $item)
            <li>
                <a href="{{ $item['path'] }}"
                    class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
                    aria-label="{{ $item['label'] }}">
                    <span class="icon">
                        <i class="{{ $item['icon'] }} {{ $item['color'] }} mr-4 text-2xl lg:mr-0"></i>
                    </span>
                    <span class="label mt-1 hidden text-sm font-medium text-gray-600 lg:block">
                        {{ $item['label'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>