<?php

namespace App\Traits;

use App\Models\Notification;

trait NotificationHelper
{
    protected function sendNotification($title, $message, $type, $icon, $color = null)
    {
        $users = \App\Models\User::all();
        
        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'icon' => $icon,
                'color' => $color ?? 'blue',
                'is_read' => false
            ]);
        }
    }
}