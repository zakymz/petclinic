<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'user')->orderBy('created_at', 'desc')->get();

        return view('admin.customer.index', compact('customers'));
    }

    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'phone_number'  => $request->phone_number,
                'role'      => 'user',
            ]);
    
            if($request->pet_name) {
                Pet::create([
                    'user_id'   => $user->id,
                    'name'      => $request->pet_name,
                    'alias_name'    => $request->alias_name,
                    'age'           => $request->age,
                    'weight'        => $request->weight,
                    'height'        => $request->height,
                    'complaint'     => $request->complaint,
                    'created_by'    => Auth::user()->id,
                ]);
            }
    
            $notif = [
                'message'   => 'Berhasil simpan pelanggan.',
                'title'     => 'Pelanggan',
            ];
    
            return redirect()->back()->with($notif);
        } catch (Throwable $e) {
            return redirect()->with(['error' => 'Gagal simpan data. Email ini sudah pernah digunakan.']);
        }
    }

    public function edit($id)
    {
        $customer = User::find($id);

        return view('admin.customer.edit', compact('customer'));
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
            'phone_number'  => $request->phone_number,
            'password'  => $password,
        ]);

        $notif = [
            'message'   => 'Berhasil update data pelanggan.',
            'title'     => 'Pelanggan',
        ];

        return redirect()->route('customer.index')->with($notif);
    }
}
