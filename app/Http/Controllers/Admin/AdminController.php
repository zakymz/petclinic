<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->orderBy('created_at', 'desc')->get();

        return view('admin.list_admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        try {
            User::create([
                'name'  => $request->name,
                'email' => $request->email,
                'password'  => Hash::make($request->password),
                'role'  => 'admin',
            ]);

            $notif = [
                'message'   => 'Berhasl tambah data',
                'title'     => 'Admin',
            ];

            return redirect()->back()->with($notif);
        } catch (Throwable $e) {
            return redirect()->with(['error' => 'Gagal simpan data. Email ini sudah pernah digunakan.']);
        }
    }

    public function edit($id)
    {
        $admin = User::find($id);

        return view('admin.list_admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        User::where('id', $id)->update([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => $password,
        ]);

        $notif = [
            'message'   => 'Berhasil update data admin.',
            'title'     => 'Admin',
        ];

        return redirect()->route('admin.index')->with($notif);
    }
}
