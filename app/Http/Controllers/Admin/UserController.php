<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.admin.users', compact('users'));
    }

    public function create()
    {
        return view('components.admin.users.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'is_admin' => ['boolean'],
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => $validated['is_admin'] ?? false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengguna berhasil ditambahkan'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error creating user: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(User $user)
    {
        return view('components.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'is_admin' => ['boolean'],
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin ?? false,
            ]);

            if ($request->filled('password')) {
                $request->validate([
                    'password' => ['confirmed', Rules\Password::defaults()],
                ]);

                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            Auth::user()->logActivity(
                'Pengguna Diperbarui',
                "Admin telah memperbarui data pengguna: {$user->name}",
                'user_updated'
            );

            return response()->json([
                'success' => true,
                'message' => 'Pengguna berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        Auth::user()->logActivity(
            'Pengguna Dihapus',
            "Admin telah menghapus pengguna: {$user->name}",
            'user_deleted'
        );
        
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}