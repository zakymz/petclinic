<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::whereNull('delete_at')->get();
        $doctors = Doctor::whereNull('delete_at')->get();
        return view('user.index', compact('services', 'doctors'));
    }
}
