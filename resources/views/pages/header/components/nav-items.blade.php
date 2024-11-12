@php
    $nav_items = [
        ["icon" => "fa-solid fa-bell", "color" => "text-blue-500", "label" => "Notifikasi", "path" => "/notifikasi"],
        ["icon" => "fa-solid fa-comments", "color" => "text-green-500", "label" => "Chatbot", "path" => "/chatbot"],
        ["icon" => "fa-solid fa-headset", "color" => "text-purple-500", "label" => "Dukungan", "path" => "/dukungan"],
    ];
@endphp

@foreach ($nav_items as $item)
    <a href="{{ $item['path'] }}"
        class="hidden w-full flex-col items-center justify-center transition-colors hover:text-[#f58a66] sm:inline-flex"
        aria-label="{{ $item['label'] }}">
        <i class="{{ $item['icon'] }} {{ $item['color'] }} mr-4 text-2xl lg:mr-0"></i>
        <h5 class="mt-1 hidden text-sm font-medium text-gray-600 lg:block">
            {{ $item['label'] }}
        </h5>
    </a>
@endforeach
