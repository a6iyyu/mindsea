<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ManageMaterial;
use App\Http\Controllers\Admin\ActivityController;

// Halaman publik
Route::get('/', function () {
    $statistics = Auth::check() ? (new StatisticsController())->getStatistics() : [];
    return view('pages.dashboard', compact('statistics'));
})->name('home');

Route::get('/tentang-kami', fn() => view('pages.tentang-kami'))->name('about');
Route::get('/dukungan', fn() => view('pages.dukungan'))->name('support');

// Rute Auth
Route::middleware('guest')->group(function () {
    // Rute login
    Route::get('/masuk', function () {
        return view('pages.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Rute register
    Route::get('/daftar', function () {
        return view('pages.register');
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
    Route::get('/profil', fn() => view('pages.profil'))->name('profile');
    Route::get('/profil/edit', fn() => view('pages.profil.edit'))->name('edit');
    Route::get('/notifikasi', fn() => view('pages.notifikasi'))->name('notifications');

    Route::prefix('materi')->name('materi.')->group(function () {
        Route::get('/', [MaterialController::class, 'index'])->name('index');
        Route::get('/search', [MaterialController::class, 'search'])->name('search');
        Route::get('/{id}', [MaterialController::class, 'show'])->name('show');
        Route::get('/{id}/perkenalan', [MaterialController::class, 'showIntroduction'])->name('show.introduction');
        Route::get('/{id}/materi-utama', [MaterialController::class, 'showMainContent'])->name('show.main');
        Route::get('/{id}/latihan-soal', [MaterialController::class, 'showExercise'])->name('show.exercise');
        Route::post('/{id}/complete', [MaterialController::class, 'completeContent'])->name('complete');
    });

    Route::get('/chatbot', fn() => view('pages.chatbot'))->name('chatbot');
    Route::post('/chat', [ChatController::class, 'chat'])->name('chat.send');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead']);
});

// Rute yang memerlukan autentikasi
Route::middleware(['auth.progress'])->group(function () {
    Route::get('/progres-belajar', [ProgressController::class, 'index'])->name('progress');

    Route::get('/latihan-soal', [ExerciseController::class, 'index'])->name('latihan');
    Route::get('/latihan-soal/{section}', [ExerciseController::class, 'showSection'])->name('latihan.section');
    Route::get('/latihan/{exercise}', [ExerciseController::class, 'show'])->name('latihan.show');
    Route::post('/latihan/{exercise}/complete', [ExerciseController::class, 'completeExercise'])
        ->name('latihan.complete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil/edit', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profil/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

Route::get('/dukungan/{category}', [SupportController::class, 'show'])->name('dukungan.show');


// Route Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management Routes - remove duplicate routes and keep only resource
    Route::resource('users', UserController::class);

    // Materials Management
    Route::resource('materials', ManageMaterial::class);

    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('activities/data', [ActivityController::class, 'getActivities'])->name('activities.data');
});