<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereNull('delete_at')->orderBy('created_at', 'desc')->paginate(6);

        return view('user.history.index', compact('orders'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        User::where('id', $id)->update([
            'email' => $request->email,
            'password'  => $password,
        ]);

        $notif = [
            'message'   => 'Berhasil update data admin.',
            'title'     => 'Admin',
        ];

        return redirect()->back()->with($notif);
    }
}
