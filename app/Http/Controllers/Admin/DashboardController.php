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
        return view(
            'admin.dashboard',
            [
                'totalService' => Services::query()->count(),
                'totalDoctor' => Doctors::query()->count()
            ]
        );
    }
}
