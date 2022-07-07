<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('e_commerce.auth.user_list', [
            'users' => User::query()
                ->where('role', config('constant.ROLE.1'))
                ->latest()
                ->get()
        ]);
    }

    public function create(): View
    {
        return view('e_commerce.auth.user_create');
    }

    public function register(): View
    {
        return view('e_commerce.frontend.register');
    }

    public function registerSubmit(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        toast("User registered successfully","success");
        return redirect()->back();
    }
}
