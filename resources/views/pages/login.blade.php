@component("layouts.main-layout", [
    "judul" => "Masuk",
    "deskripsi" => "Masuk ke akun Anda dan jelajahi semua fitur di mindsea.",
    "halaman_khusus" => true,
    "auth" => false
])
<main class="flex flex-col justify-center items-center min-h-screen w-full relative">
    <section class="absolute inset-0 -z-10 overflow-hidden opacity-20">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 320"
            preserveAspectRatio="none"
            class="absolute bottom-0 w-full"
        >
            <path
                fill="#93c5fd"
                d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,208C672,213,768,203,864,181.3C960,160,1056,128,1152,128C1248,128,1344,160,1392,176L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
            />
            <path
                fill="#60a5fa"
                d="M0,256L48,261.3C96,267,192,277,288,272C384,267,480,245,576,234.7C672,224,768,224,864,229.3C960,235,1056,245,1152,240C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
            />
        </svg>
        <svg viewBox="0 0 200 200" class="absolute left-10 bottom-20 w-24 h-24 text-green-600">
            <path
                fill="currentColor"
                d="M100,10 L150,90 L130,90 L160,150 L130,150 L140,190 L60,190 L70,150 L40,150 L70,90 L50,90 Z"
            />
        </svg>
        <svg viewBox="0 0 200 200" class="absolute right-10 bottom-40 w-16 h-16 text-green-500">
            <path
                fill="currentColor"
                d="M100,10 L150,90 L130,90 L160,150 L130,150 L140,190 L60,190 L70,150 L40,150 L70,90 L50,90 Z"
            />
        </svg>
    </section>

    <a href="/" class="absolute top-8 left-8 text-gray-600 hover:text-[#f58a66] transition-colors">
        <i class="fa-solid fa-arrow-left text-2xl"></i>
    </a>

    @include("components.auth.login")
</main>
@endcomponent