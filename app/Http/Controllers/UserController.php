<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'in:admin,petugas'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Password wajib di-hash
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Pengecualian validasi unique untuk username milik user ini sendiri
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$id],
            'role' => ['required', 'in:admin,petugas'],
            'password' => ['nullable', 'confirmed', Password::defaults()], // Password boleh kosong jika tidak ingin diubah
        ]);

        $dataUpdate = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ];

        // Jika form password diisi, berarti admin ingin mereset password user ini
        if ($request->filled('password')) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        $user->update($dataUpdate);

        return redirect()->route('users.index')->with('success', 'Data Pengguna berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        // Mencegah admin menghapus dirinya sendiri saat sedang login
        if (auth()->id() == $user->id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}