<?php

namespace App\Traits;

use App\Models\Activity;

trait LogsActivity
{
    public function logActivity($title, $description, $type)
    {
        Activity::create([
            'title' => $title,
            'description' => $description,
            'type' => $type,
            'user_id' => auth()->id() ?? null,
        ]);
    }
}
