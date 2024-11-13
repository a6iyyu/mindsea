<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateProgress
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/masuk')->with('error', 'Silakan masuk terlebih dahulu untuk mengakses halaman ini.');
        }

        return $next($request);
    }
} 