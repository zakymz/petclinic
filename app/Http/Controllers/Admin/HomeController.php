<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Pet;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $order = Order::whereDate('date', Carbon::now())->whereNull('delete_at')->count();
        $customer = User::where('role', 'user')->count();
        $pet = Pet::whereNull('delete_at')->count();
        $doctor = Doctor::whereNull('delete_at')->count();
        $service = Service::whereNull('delete_at')->count();
        return view('admin.index', compact('order', 'customer', 'pet', 'service', 'doctor'));
    }
}
