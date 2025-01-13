<section class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
  @foreach($materi as $item)
    <article
    class="flex flex-col justify-between rounded-xl border-4 {{ $item->progress && $item->progress->is_completed ? 'border-gray-200 bg-gray-50' : "border-{$item->color}-200 bg-white" }} p-8 shadow-lg transition-all duration-300 ease-in-out lg:hover:shadow-xl focus-within:ring-4 focus-within:ring-{{$item->color}}-200">
    @if($item->progress && $item->progress->is_completed)
    <div class="flex items-center gap-2 text-gray-500">
      <i class="fa-solid fa-check-circle"></i>
      <span>Sudah Selesai</span>
      <time datetime="{{ $item->progress->completed_at }}" class="text-sm">
      ({{ $item->progress->completed_at->diffForHumans() }})
      </time>
    </div>
  @endif
    <header class="mb-6 flex flex-col items-start gap-6 lg:flex-row lg:items-center justify-between">
      <i
      class="fa-solid fa-book text-3xl {{ $item->progress && $item->progress->is_completed ? 'bg-gray-100 text-gray-500' : "bg-{$item->color}-100 text-{$item->color}-500" }} rounded-xl p-5"></i>
      <div class="flex items-center gap-4 text-base">
      <span
        class="flex items-center gap-2 {{ $item->progress && $item->progress->is_completed ? 'text-gray-500' : 'text-gray-600' }}">
        <i class="fa-solid fa-circle-info"></i>
        {{ $item->difficulty_level }}
      </span>
      </div>
    </header>
    <section>
      <h3
      class="mb-2 text-xl font-bold {{ $item->progress && $item->progress->is_completed ? 'text-gray-600' : 'text-gray-800' }} lg:text-2xl">
      {{ $item->title }}
      </h3>
      <h5
      class="mb-2 text-base leading-relaxed {{ $item->progress && $item->progress->is_completed ? 'text-gray-500' : 'text-gray-600' }} lg:text-lg">
      {{ $item->description }}
      </h5>

      <button
      onclick="window.SpeakText('{{ $item->title }}, {{ $item->description }}, tingkat kesulitan: {{ $item->difficulty_level }}, {{ $item->progress ? 'Sudah selesai ' . $item->progress->completed_at->diffForHumans(['locale' => 'id']) . ', Apakah anda ingin mengulangi materi ini lagi?' : '' }}')"
      class="flex items-center gap-2 px-4 py-2 transform rounded-lg {{$item->progress && $item->progress->is_completed ? 'bg-gray-100 text-gray-500' : "bg-{$item->color}-100 text-{$item->color}-500 hover:bg-{$item->color}-200 transition-colors"}}">
      <i class="fas fa-volume-up transition-all duration-300" aria-hidden="true"></i>
      <h4>Dengarkan</h4>
      </button>
    </section>

    <footer>
      @if($item->progress && $item->progress->is_completed)
      <div class="flex items-center justify-between">
      <div class="flex items-center gap-2 text-gray-500">
      <i class="fa-solid fa-check-circle"></i>
      <span>Sudah Selesai</span>
      <time datetime="{{ $item->progress->completed_at }}"
      class="text-sm">({{ $item->progress->completed_at->diffForHumans(['locale' => 'id']) }})</time>
      </div>
      <a href="{{ route('materi.show', $item->id) }}"
      class="flex items-center gap-2 text-{{$item->color}}-500 hover:text-{{$item->color}}-600 transition-colors">
      <i class="fa-solid fa-rotate"></i>
      <span>Ulangi</span>
      </a>
      </div>
    @else
      <br>
      <a href="{{ route('materi.show', $item->id) }}"
      class="rounded bg-{{$item->color}}-500 px-6 py-3 text-base font-medium text-white transition-colors lg:text-lg lg:rounded-xl lg:hover:bg-{{$item->color}}-600 focus:outline-none focus:ring-4 focus:ring-{{$item->color}}-200">
      Mulai
      <i class="ml-2 fa-solid fa-arrow-right"></i>
      </a>
    @endif
    </footer>
    </article>
  @endforeach
</section>