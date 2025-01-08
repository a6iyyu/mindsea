<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($notification) {
                switch ($notification->type) {
                    case 'material_added':
                        $notification->icon = 'fa-book';
                        $notification->color = 'green';
                        break;
                    case 'material_updated':
                        $notification->icon = 'fa-edit';
                        $notification->color = 'blue';
                        break;
                    case 'material_deleted':
                        $notification->icon = 'fa-trash';
                        $notification->color = 'red';
                        break;
                    case 'exercise_added':
                        $notification->icon = 'fa-pencil';
                        $notification->color = 'purple';
                        break;
                    case 'exercise_updated':
                        $notification->icon = 'fa-edit';
                        $notification->color = 'blue';
                        break;
                    case 'exercise_deleted':
                        $notification->icon = 'fa-trash';
                        $notification->color = 'red';
                        break;
                    default:
                        $notification->icon = 'fa-bell';
                        $notification->color = 'blue';
                }
                return $notification;
            });

        return view('pages.notifikasi', compact('notifications'));
    }

    public function markAsRead($id)
    {
        try {
            $notification = Notification::where('user_id', auth()->id())
                                     ->where('id', $id)
                                     ->first();
                                     
            if (!$notification) {
                return response()->json([
                    'success' => false,
                    'message' => 'Notification not found'
                ], 404);
            }

            $notification->update(['is_read' => true]);
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error marking notification as read: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Failed to mark notification as read'
            ], 500);
        }
    }

    public function markAllAsRead()
    {
        try {
            $count = Notification::where('user_id', auth()->id())
                ->where('is_read', false)
                ->update(['is_read' => true]);

            return response()->json([
                'success' => true,
                'message' => 'All notifications marked as read',
                'count' => $count
            ]);
        } catch (\Exception $e) {
            \Log::error('Error marking all notifications as read: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to mark all notifications as read'
            ], 500);
        }
    }

    public function getUnreadCount()
    {
        try {
            if (!auth()->check()) {
                return response()->json(['count' => 0]);
            }

            $count = Notification::where('user_id', auth()->id())
                               ->where('is_read', false)
                               ->count();
                               
            return response()->json(['count' => $count]);
        } catch (\Exception $e) {
            \Log::error('Error getting unread notification count: ' . $e->getMessage());
            return response()->json(['count' => 0]);
        }
    }

    public function deleteAll()
    {
        try {
            $count = Notification::where('user_id', auth()->id())->delete();

            return response()->json([
                'success' => true,
                'message' => 'All notifications deleted successfully',
                'count' => $count
            ]);
        } catch (\Exception $e) {
            \Log::error('Error deleting all notifications: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete notifications'
            ], 500);
        }
    }
}
