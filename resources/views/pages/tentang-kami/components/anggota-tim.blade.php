<section class="mb-12">
    <div class="bg-[#fceede]/30 rounded-xl p-8 border-4 border-[#f58a66]/20">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tim Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $team = [
                    [
                        "nama" => "Rafi Abiyyu Airlangga",
                        "jabatan" => "Project Manager",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Felix",
                    ],
                    [
                        "nama" => "Pramudya Surya Anggara Putra",
                        "jabatan" => "Full Stack Developer",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah",
                    ],
                    [
                        "nama" => "Atabik Mutawakilalallah",
                        "jabatan" => "Quality Assurance",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Budi",
                    ],
                    [
                        "nama" => "Yoppy Yunhasnawa",
                        "jabatan" => "Supervisor",
                        "foto" => "https://api.dicebear.com/7.x/avataaars/svg?seed=Dina",
                    ]
                ];
            @endphp

            @foreach($team as $member)
                <article class="bg-white p-6 rounded-xl text-center">
                    <img src="{{ $member['foto'] }}" alt="{{ $member['nama'] }}"
                        class="w-24 h-24 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $member['nama'] }}</h3>
                    <p class="text-gray-600">{{ $member['jabatan'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>