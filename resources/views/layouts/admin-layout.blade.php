<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="max-[8192px]:opacity-0 max-[3120px]:opacity-100 max-[3120px]:m-0 max-[3120px]:p-0 max-[3120px]:box-border max-[3120px]:[font-family:'Plus_Jakarta_Sans',Times,sans-serif,serif] max-[324px]:hidden"
>

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index" />
    <meta name="description" content="{{ $deskripsi }}" />
    <meta property="og:title" content="{{ $judul }} | mindsea" />
    <meta property="og:description" content="{{ $deskripsi }}" />
    <meta property="og:image" content="{{ asset("favicon.ico") }}" />
    <meta name="twitter:title" content="{{ $judul }} | mindsea" />
    <meta name="twitter:description" content="{{ $deskripsi }}" />
    <meta name="twitter:image" content="{{ asset("favicon.ico") }}" />
    <title>{{ $judul }} | mindsea</title>
    <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @viteReactRefresh
    @vite(["resources/js/app.js"])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        @media screen and (max-width: 3120px) {
            ::-webkit-scrollbar {
                display: none !important;
            }
            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active {
                -webkit-text-fill-color: #374151 !important;
                -webkit-box-shadow: 0 0 0 30px #fceede inset !important;
                transition: background-color 5000s ease-in-out 0s;
                caret-color: #374151;
                box-shadow: 0 0 0 30px #fceede inset !important;
            }
            input:autofill {
                -webkit-text-fill-color: #374151 !important;
                box-shadow: 0 0 0 30px #fceede inset !important;
            }
            input[type="search"]::-webkit-search-cancel-button {
                -webkit-appearance: none;
                appearance: none;
            }
        }
    </style>
</head>

<body class="mx-auto overflow-x-hidden">
    <header class="fixed left-0 top-0 z-50 h-[4.5rem] w-screen border-b-2 border-gray-200 bg-[#fceede] shadow-md">
        <div class="mx-auto flex h-full max-w-[90vw] items-center justify-between lg:max-w-[96vw]">
            <span class="flex items-center gap-3 lg:gap-6">
                <button
                    type="button"
                    onclick="toggleSidebar()"
                    class="rounded-xl p-3 text-gray-600 transition-colors hover:bg-[#f58a66]/10 lg:hidden"
                    aria-label="Toggle Sidebar"
                >
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="/admin" class="flex items-center gap-2">
                    <i class="fas fa-brain text-[#f58a66] text-2xl"></i>
                    <span class="hidden text-xl font-bold text-gray-800 lg:inline">Mindsea Admin</span>
                </a>
            </span>

            <nav class="flex items-center gap-4">
                <a href="/" class="flex items-center gap-2 rounded-xl px-4 py-2 text-gray-600 transition-colors hover:bg-[#f58a66]/10">
                    <i class="fas fa-home"></i>
                    <span class="hidden lg:inline">User View</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 rounded-xl px-4 py-2 text-gray-600 transition-colors hover:bg-[#f58a66]/10">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden lg:inline">Keluar</span>
                    </button>
                </form>
            </nav>
        </div>
    </header>

    @include("shared.sidebar.admin")

    <!-- Main Content -->
    <main class="ml-16 min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-68 lg:py-28 lg:pr-10 lg:pl-60">
        {{ $slot }}
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        }
    </script>

    <button onclick="showActivities()"
        class="rounded-xl bg-blue-100 px-4 py-2 text-blue-600 hover:bg-blue-200 transition-colors">
        <i class="fas fa-history mr-2"></i>
        Riwayat Aktivitas
    </button>

    <script>
        function showAllActivities() {
            fetch('/admin/activities/data')
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'error') {
                        throw new Error(result.message);
                    }

                    const activities = result.data;

                    const existingModal = document.getElementById('activityModal');
                    if (existingModal) {
                        existingModal.remove();
                    }

                    // Create modal
                    const modalContent = document.createElement('div');
                    modalContent.innerHTML = `
                        <div id="activityModal" class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="min-h-screen px-4 text-center">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                <div class="inline-block w-full max-w-2xl my-8 p-6 text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                                    <h2 class="text-xl font-semibold mb-4">Riwayat Aktivitas</h2>
                                    <div class="activities-container max-h-[60vh] overflow-y-auto space-y-4 p-2">
                                    </div>
                                    <div class="mt-6 flex justify-end">
                                        <button type="button" onclick="closeModal('activityModal')"
                                            class="rounded-xl bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    document.body.appendChild(modalContent);

                    // Populate activities
                    const activitiesContainer = document.querySelector('.activities-container');
                    activitiesContainer.innerHTML = activities.map(activity => `
                        <div class="flex items-start gap-4 p-4 rounded-xl border-2 border-gray-100 hover:border-blue-100 transition-colors">
                            <div class="flex-shrink-0">
                                ${getActivityIcon(activity.type)}
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">${activity.title}</h3>
                                <p class="text-gray-600">${activity.description}</p>
                                <time datetime="${activity.created_at}" class="text-sm text-gray-500">
                                    ${moment(activity.created_at).fromNow()}
                                </time>
                            </div>
                        </div>
                    `).join('');

                    // Show modal
                    const modal = document.getElementById('activityModal');
                    modal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memuat aktivitas');
                });
        }

        function getActivityIcon(type) {
            const icons = {
                'material_created': '<i class="fas fa-plus-circle text-green-500 text-xl"></i>',
                'material_updated': '<i class="fas fa-edit text-blue-500 text-xl"></i>',
                'material_deleted': '<i class="fas fa-trash text-red-500 text-xl"></i>',
                'material_completed': '<i class="fas fa-check-circle text-green-500 text-xl"></i>',
                'user_registered': '<i class="fas fa-user-plus text-green-500 text-xl"></i>',
                'user_updated': '<i class="fas fa-user-pen text-blue-500 text-xl"></i>',
                'user_deleted': '<i class="fas fa-user-xmark text-red-500 text-xl"></i>',
                'exercise_completed': '<i class="fas fa-check-circle text-green-500 text-xl"></i>',
                'exercise_created': '<i class="fas fa-plus-circle text-green-500 text-xl"></i>',
                'exercise_updated': '<i class="fas fa-edit text-blue-500 text-xl"></i>',
                'exercise_deleted': '<i class="fas fa-trash text-red-500 text-xl"></i>'
            };
            return icons[type] || '<i class="fas fa-info-circle text-gray-500 text-xl"></i>';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.remove();
            }
        }
    </script>

    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.js"></script>
    <script>
        moment.locale('id');
    </script>

</body>

</html>