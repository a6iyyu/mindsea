<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\MaterialController;

// Halaman publik
Route::get('/', function () {
    $statistics = [];

    if(Auth::check()) {
        $statisticsController = new StatisticsController();
        $statistics = $statisticsController->getStatistics();
    }

    return view('pages.landing.index', compact('statistics'));
})->name('home');

// Auth routes
Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/masuk', function () {
        return view('pages.auth.login.index');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Register routes
    Route::get('/daftar', function () {
        return view('pages.auth.register.index');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// OAuth Routes
Route::get('auth/{provider}', [OAuthController::class, 'redirectToProvider'])->name('auth.provider');
Route::get('auth/{provider}/callback', [OAuthController::class, 'handleProviderCallback'])->name('auth.callback');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profil', function () {
        return view('pages.sidebar.menu.profil.index');
    })->name('profile');

    // Halaman yang membutuhkan auth
    Route::get('/preferensi', function () {
        return view('pages.sidebar.menu.preferensi.index');
    })->name('preferences');

    Route::middleware(['auth'])->group(function() {
        Route::get('/materi/search', [MaterialController::class, 'search'])->name('materi.search');
        Route::get('/materi/{id}', [MaterialController::class, 'show'])->name('materi.show');
        Route::get('/materi', [MaterialController::class, 'index'])->name('materi.index');
    });
});

// Public routes
Route::get('/latihan-soal', function () {
    return view('pages.sidebar.menu.latihan-soal.index');
})->name('exercises');

Route::get('/tentang-kami', function () {
    return view('pages.sidebar.menu.tentang-kami.index');
})->name('about');

Route::get('/dukungan', function () {
    return view('pages.header.menu.dukungan.index');
})->name('support');

Route::get('/notifikasi', function () {
    return view('pages.header.menu.notifikasi.index');
})->name('notifications');

Route::get('/chatbot', function () {
    return view('pages.header.menu.chatbot.index');
})->name('chatbot');

// Rute yang memerlukan autentikasi
Route::middleware(['auth.progress'])->group(function () {
    Route::get('/progres-belajar', function () {
        return view('pages.sidebar.menu.progres-belajar.index');
    })->name('progress');

    // Route::get('/latihan-soal', function () {
    //     return view('pages.sidebar.menu.latihan-soal.index');
    // })->name('exercises');

    // Route::get('/materi', function () {
    //     return view('pages.sidebar.menu.materi.index');
    // })->name('materials');
});

Route::get('/materi/{id}/perkenalan', [MaterialController::class, 'showIntroduction'])->name('materi.show.introduction');
Route::get('/materi/{id}/materi-utama', [MaterialController::class, 'showMainContent'])->name('materi.show.main');
Route::get('/materi/{id}/latihan-soal', [MaterialController::class, 'showExercise'])->name('materi.show.exercise');


