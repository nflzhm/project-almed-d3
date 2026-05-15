<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'divisi' => 'nullable|string|max:255',

            'password' => 'nullable|min:8|confirmed',
            'current_password' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ======================
        // UPDATE FOTO
        // ======================
        if ($request->hasFile('foto')) {

            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('profile', 'public');

            $user->foto = $path;
        }

        // ======================
        // UPDATE DATA
        // ======================
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        $user->divisi = $request->divisi;

        // ======================
        // UPDATE PASSWORD
        // ======================
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile berhasil diperbarui');
    }

    // ==========================
    // LOGOUT SEMUA SESSION
    // ==========================
    public function logoutAll()
    {
        $user = Auth::user();

        // opsional: pakai database sessions
        if (config('session.driver') === 'database') {
            \DB::table('sessions')
                ->where('user_id', $user->id)
                ->delete();
        }

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Semua sesi berhasil dihapus (logout perangkat lain)');
    }
}