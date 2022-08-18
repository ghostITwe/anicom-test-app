<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private Request $request;
    const AUTH_RULES = [
        'login' => "required|string",
        'password' => "required"
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        if (Auth::check() && Auth::user()->isAdmin()) return redirect()->route('admin.dashboard');

        $validator = $this->checkAuthCredentials();
        $credentials = $this->request->only('login', 'password');

        if ($this->checkAuthCredentials()->fails()) {
            return back()->withErrors($validator);
        }

        if (!Auth::attempt($credentials)) {
            return back()->withErrors("Неверный логин или пароль");
        }

        $this->request->session()->regenerate();

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return back();
    }

    private function checkAuthCredentials() {
        return Validator::make($this->request->all(), static::AUTH_RULES);
    }

}
