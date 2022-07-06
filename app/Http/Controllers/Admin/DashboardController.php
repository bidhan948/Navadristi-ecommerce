<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\Services;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return "i am herer";
        $service = Services::all();
        $doctor = Doctors::all();
        $totalService = count($service);
        $totalDoctor = count($doctor);
        return view('admin.dashboard', ['totalService' => $totalService, 'totalDoctor'=>$totalDoctor]);
    }
}