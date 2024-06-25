<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ...

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/'); // Redireciona para a página principal após o login
    }
}
