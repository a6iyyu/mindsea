<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->logActivity(
            'Pengguna Baru',
            "{$user->name} telah bergabung dengan mindsea",
            'user_registered'
        );
    }
}