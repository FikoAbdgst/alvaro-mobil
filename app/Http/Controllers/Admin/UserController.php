<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua Admin (User) yang ada di sistem.
     */
    public function index()
    {
        // Ambil semua user, karena diasumsikan semua user adalah Admin
        $users = User::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form untuk membuat Admin baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan Admin baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            // Gunakan konfirmasi password bawaan Laravel
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            // Kolom 'is_admin' dihilangkan
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit Admin.
     * * @param  \App\Models\User  $user
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui Admin yang sudah ada di database.
     * * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // Pastikan email unik, kecuali untuk dirinya sendiri
                Rule::unique('users')->ignore($user->id),
            ],
            // Password opsional, hanya divalidasi jika diisi
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Jika password diisi, update password
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Akun Admin berhasil diperbarui.');
    }

    /**
     * Menghapus Admin dari database.
     * * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        // Pencegahan: Jangan biarkan admin menghapus dirinya sendiri saat sedang login
        if (Auth::user()->id === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Admin yang sedang Anda gunakan.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Akun Admin berhasil dihapus.');
    }
}
