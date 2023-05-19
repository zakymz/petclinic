<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereNull('delete_at')->orderBy('created_at', 'desc')->get();
        $customers = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        $doctors = Doctor::whereNull('delete_at')->orderBy('created_at', 'desc')->get();
        $services = Service::whereNull('delete_at')->orderBy('created_at', 'desc')->get();

        return view('admin.order.index', compact('orders', 'customers', 'doctors', 'services'));
    }

    public function store(Request $request)
    {
        $length = 10;
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        $order_code = 'ORDER-'.date('Y').Str::upper($random);

        $subtotal = str_replace('.', '', $request->subtotal);
        $total = $subtotal * $request->qty;

        Order::create([
            'user_id'   => $request->user_id,
            'pet_id'    => $request->pet_id,
            'doctor_id' => $request->doctor_id,
            'service_id'    => $request->service_id,
            'order_code'    => $order_code,
            'date'          => $request->date,
            'qty'           => $request->qty,
            'subtotal'      => $subtotal,
            'total'         => $total,
            'status'        => 'pending',
            'created_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Pesanan berhasil dibuat',
            'title'     => 'Pesanan',
        ];

        return redirect()->back()->with($notif);
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.order.show', compact('order'));
    }

    public function delete($id)
    {
        Order::where('id', $id)->update([
            'delete_at' => Carbon::now(),
        ]);

        $notif = [
            'message'   => 'Pesanan berhasil dihapus',
            'title'     => 'Pesanan',
        ];

        return redirect()->route('order.index')->with($notif);
    }

    public function update(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'status'        => $request->status,
            'updated_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Status berhasil di update',
            'title'     => 'Pesanan',
        ];

        return redirect()->back()->with($notif);
    }
}
