<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('pages.admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.users.components.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['boolean'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('pages.admin.users.components.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
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

        auth()->user()->logActivity(
            'Pengguna Diperbarui',
            "Admin telah memperbarui data pengguna: {$user->name}",
            'user_updated'
        );


        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        auth()->user()->logActivity(
            'Pengguna Dihapus',
            "Admin telah menghapus pengguna: {$user->name}",
            'user_deleted'
        );
        
        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus');
    }
}
