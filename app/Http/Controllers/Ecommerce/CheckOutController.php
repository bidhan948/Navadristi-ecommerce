<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\e_commerce\package_detail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout(package_detail $package_detail)
    {
        if (session('is_logged_in') == null) {
            return redirect()->route('user.login');
        } else {
            dd("Nic Asia payment goes here");
        }
    }
}
