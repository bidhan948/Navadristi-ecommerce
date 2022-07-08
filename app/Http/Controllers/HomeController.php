<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role_as == 1) {
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('welcome');
    }

    public function emailCheck()
    {
        return view('frontend.email');
    }
}
 