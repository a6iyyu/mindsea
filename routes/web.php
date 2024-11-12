<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\AuthController;

// Halaman publik
Route::get('/', function () {
    return view('pages.landing.index');
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
});

// Public routes
Route::get('/latihan-soal', function () {
    return view('pages.sidebar.menu.latihan-soal.index');
})->name('exercises');

Route::get('/materi', function () {
    return view('pages.sidebar.menu.materi.index');
})->name('materials');

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

Route::get('/progres-belajar', function () {
    return view('pages.sidebar.menu.progres-belajar.index');
})->name('progress');


