<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admins; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminsCon extends BaseController
{


   public function index()
    {
        $dataadmin = Admins::all(); // Ambil semua data dari tabel admins
        return view('berandaadmin', compact('dataadmin')); // Kirim data ke view
    }

    public function tambahadmin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'username'    => 'required',
            'password' => 'required',
            'roles'    => 'required',
        ]);

        // Simpan ke database
        Admins::create([
            'nama_lengkap'     => $request->nama_lengkap,
            'username'    => $request->username,
            'password' => bcrypt($request->password),
            'roles'    => $request->roles,
        ]);

        return redirect()->back()->with('success', 'Admin berhasil ditambahkan!');
    }

    public function edit($id)
{
    $admin = Admins::findOrFail($id);
    return view('admin.edit', compact('admin'));
}

public function destroy($id)
{
    $admin = Admins::findOrFail($id);
    $admin->delete();
    return redirect()->back()->with('success', 'Data admin berhasil dihapus');
}
public function update(Request $request, $id)
{
    $admin = Admins::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username'     => 'required',
        'roles'        => 'required|string',
    ]);

    $admin->nama_lengkap = $request->nama_lengkap;
    $admin->username = $request->username;
    $admin->roles = $request->roles;

    if (!empty($request->password)) {
        $admin->password = bcrypt($request->password);
    }

    $admin->save();

    return redirect()->back()->with('success', 'Admin berhasil diperbarui!');
}

public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended('/_dashboard')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/_login')->with('success', 'Anda telah logout.');
}

}
