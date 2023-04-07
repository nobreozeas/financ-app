<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function registrar()
    {
        return view('login.registrar');
    }

    public function esqueciSenha()
    {
        return view('login.esqueci_senha');
    }

    public function recuperarSenha()
    {
        return view('login.recuperar_senha');
    }
}
