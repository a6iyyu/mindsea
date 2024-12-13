<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;

// Halaman publik
Route::get('/', function () {

    $statistics = Auth::check() ? (new StatisticsController())->getStatistics() : [];

    return view('pages.dashboard.index', compact('statistics'));
})->name('home');

Route::get('/tentang-kami', fn() => view('pages.tentang-kami.index'))->name('about');
Route::get('/dukungan', fn() => view('pages.dukungan.index'))->name('support');
Route::get('/chatbot', fn() => view('pages.chatbot.index'))->name('chatbot');

// Rute Auth
Route::middleware('guest')->group(function () {
    // Rute login
    Route::get('/masuk', function () {
        return view('pages.auth.login.index');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Rute register
    Route::get('/daftar', function () {
        return view('pages.auth.register.index');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Rute OAuth
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('{provider}', [OAuthController::class, 'redirectToProvider'])->name('provider');
    Route::get('{provider}/callback', [OAuthController::class, 'handleProviderCallback'])->name('callback');
});

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profil', fn() => view('pages.profil.index'))->name('profile');
    Route::get('/preferensi', fn() => view('pages.preferensi.index'))->name('preferences');
    Route::get('/notifikasi', fn() => view('pages.notifikasi.index'))->name('notifications');

    Route::prefix('materi')->name('materi.')->group(function () {
        Route::get('/', [MaterialController::class, 'index'])->name('index');
        Route::get('/search', [MaterialController::class, 'search'])->name('search');
        Route::get('/{id}', [MaterialController::class, 'show'])->name('show');
        Route::get('/{id}/perkenalan', [MaterialController::class, 'showIntroduction'])->name('show.introduction');
        Route::get('/{id}/materi-utama', [MaterialController::class, 'showMainContent'])->name('show.main');
        Route::get('/{id}/latihan-soal', [MaterialController::class, 'showExercise'])->name('show.exercise');
        Route::post('/{id}/complete', [MaterialController::class, 'completeContent'])->name('complete');
    });

    Route::post('/chat', [ChatController::class, 'chat'])->name('chat');
});

// Rute yang memerlukan autentikasi
Route::middleware(['auth.progress'])->group(function () {
    Route::get('/progres-belajar', [ProgressController::class, 'index'])->name('progress');

    Route::get('/latihan-soal', [ExerciseController::class, 'index'])->name('latihan.index');
    Route::get('/latihan-soal/{section}', [ExerciseController::class, 'showSection'])->name('latihan.section');
    Route::get('/latihan/{exercise}', [ExerciseController::class, 'show'])->name('latihan.show');
    Route::post('/latihan/{exercise}/complete', [ExerciseController::class, 'completeExercise'])
        ->name('latihan.complete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
