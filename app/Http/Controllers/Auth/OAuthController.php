<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class OAuthController extends Controller
{
    protected $providers = ['google', 'github'];
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, $this->providers)) {
            return redirect('/masuk')->with('error', 'Provider tidak valid');
        }
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect('/masuk')->with('error', 'Terjadi kesalahan saat menghubungkan ke ' . $provider);
        }
    }

    public function handleProviderCallback($provider)
    {
        if (!in_array($provider, $this->providers)) {
            return redirect('/masuk')->with('error', 'Provider tidak valid');
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]);
            }


            Auth::login($user, true);
            session()->regenerate();
            return redirect('/');
        } catch (\Exception $e) {
            \Log::error('Error during OAuth login: ' . $e->getMessage());
            return redirect('/masuk')->with('error', 'Gagal login menggunakan ' . $provider);
        }
    }
}

?>