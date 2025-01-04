<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {
  }
  public function boot(): void
  {

    Route::aliasMiddleware('admin', AdminMiddleware::class);
  }
}