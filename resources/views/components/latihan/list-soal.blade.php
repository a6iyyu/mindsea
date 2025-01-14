<section class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
    @foreach($exercise_lists as $exercise_list)
        @php
            $exercise = App\Models\Exercise::where('id', $exercise_list->id)->first();
            $userExercise = $exercise
                ? App\Models\UserExercise::where('user_id', auth()->id())->where('exercise_id', $exercise->id)->first()
                : null;
        @endphp
        <article class="rounded-xl border-4 {{ $userExercise ? 'border-gray-200 bg-gray-50' : 'border-' . $exercise_list->color . '-200 bg-white' }} p-8 shadow-lg transition-all hover:shadow-xl">
            <header class="mb-6 flex flex-col lg:flex-row items-center justify-between">
                <i class="fa-solid {{ $exercise_list->icon }} {{ $userExercise ? 'bg-gray-100 text-gray-500' : 'bg-' . $exercise_list->color . '-100 text-' . $exercise_list->color . '-500' }} rounded-xl text-3xl p-5"></i>
                @if($userExercise)
                    <span class="flex items-center gap-2 text-gray-500">
                        <i class="fa-solid fa-check-circle"></i>
                        <span>Nilai: {{ $userExercise->score }}</span>
                    </span>
                @endif
            </header>

            <h3 class="mb-4 text-2xl font-bold {{ $userExercise ? 'text-gray-600' : 'text-gray-800' }}">
                Latihan {{ $exercise_list->title }}
            </h3>
            <h5 class="mb-4 text-lg leading-relaxed {{ $userExercise ? 'text-gray-500' : 'text-gray-600' }}">
                {{ $exercise_list->description }}
            </h5>

            <button
                onclick="window.SpeakText('Latihan {{ $exercise_list->title }} {{ $exercise_list->description }} {{ $userExercise ? ', Latihan sudah selesai pada ' . $userExercise->completed_at->diffForHumans(['locale' => 'id']) . ', nilai: ' . $userExercise->score . ', apakah anda ingin mengulangi latihan ini lagi?' : ': Latihan, ini, belum, selesai. apakah, anda, ingin, mencoba, latihan, ini?' }}')"
                class="mb-6 flex items-center gap-2 px-4 py-2 transform rounded-lg {{ $userExercise ? 'bg-gray-100 text-gray-500' : 'bg-' . $exercise_list->color . '-100 text-' . $exercise_list->color . '-700' }} hover:bg-amber-200 transition-colors"
            >
                <i class="fas fa-volume-up" aria-hidden="true"></i>
                <h4>Dengarkan</h4>
            </button>

            <footer>
                @if($userExercise)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 text-gray-500">
                            <i class="fa-solid fa-check-circle"></i>
                            <span>Sudah Selesai</span>
                            <time datetime="{{ $userExercise->completed_at }}"
                                class="text-sm">({{ \Carbon\Carbon::parse($userExercise->completed_at)->diffForHumans() }})</time>
                        </div>
                        <a href="{{ route('latihan.section', $exercise_list->id) }}"
                            class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700">
                            <span>Kerjakan Lagi</span>
                            <i class="fa-solid fa-redo"></i>
                        </a>
                    </div>
                @else
                    <a
                        href="{{ route('latihan.section', $exercise_list->id) }}"
                        class="inline-flex w-full items-center justify-center gap-3 rounded-xl bg-{{ $exercise_list->color }}-500 py-4 text-lg font-medium text-white transition-colors hover:bg-{{ $exercise_list->color }}-600 focus:ring-4 focus:ring-{{ $exercise_list->color }}-200"
                    >
                        <span>Mulai Latihan</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endif
            </footer>
        </article>
    @endforeach
</section>