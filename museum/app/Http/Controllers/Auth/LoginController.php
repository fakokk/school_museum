<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return route('personal'); // Возвращает URL именованного маршрута
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
