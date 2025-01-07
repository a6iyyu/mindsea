<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    public function logActivity($title, $description, $type)
    {
        Activity::create([
            'title' => $title,
            'description' => $description,
            'type' => $type,
            'user_id' => Auth::id() ?? null,
        ]);
    }
}
