<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
{
    $users = User::latest()->paginate(10);

    $totalAdmin = User::where('role', 'admin')->count();

    $totalSuperAdmin = User::where('role', 'superadmin')->count();

    $newThisMonth = User::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

    return view('admin.pengguna', compact(
        'users',
        'totalAdmin',
        'totalSuperAdmin',
        'newThisMonth'
    ));
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:8',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.pengguna.index');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'role' => 'required'
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->password) {
            $request->validate([
                'password' => 'confirmed|min:8'
            ]);

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.pengguna.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.pengguna.index');
    }
}