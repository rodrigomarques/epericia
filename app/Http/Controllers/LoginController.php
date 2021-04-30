<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        return view("login");
    }

    public function esqueceuSenha(Request $request){
        return view("esqueceu-senha");
    }
}
