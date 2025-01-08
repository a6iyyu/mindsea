@php
use Illuminate\Support\Facades\Auth;
@endphp

<section class="mb-10 p-8 rounded-xl bg-white border-4 border-[#f58a66]/20 shadow-md">
    <article class="mb-12 flex items-center gap-8">
        <i class="fa-solid fa-user grid h-28 w-28 place-items-center text-5xl bg-[#fceede] p-4 rounded-full text-[#f58a66]"></i>
        <div class="flex flex-col">
            <h3 class="font-bold text-2xl text-slate-800">{{ Auth::user()->name }}</h3>
            <h5 class="italic text-slate-700/50">{{ Auth::user()->email }}</h5>
            <h5 class="italic text-slate-700/50">{{ Auth::user()->bio }}</h5>
        </div>
    </article>

    <!-- Konek Google -->
    <div class="flex flex-col gap-4 sm:flex-row">
        <a href="{{ route('profil.edit') }}" 
           class="px-6 py-3 bg-[#f58a66] text-white rounded-lg hover:bg-[#f47951] transition-colors focus:ring-4 focus:ring-[#fceede] text-center">
            <i class="fa-solid fa-edit mr-2"></i>Edit Profil
        </a>
    </div>
</section>