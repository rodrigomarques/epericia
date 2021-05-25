<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $data = [];
        $lista = $request->session()->get('rotas', []);
        
        return view("admin/index/index", $data);
    }

    public function sair(Request $request) {
        \Auth::logout();

        $request->session()->forget('rotas');
        $request->session()->flush();

        return redirect()->route('home');
    }

    public function naoautorizado(Request $request) {
        $data = [];
        
        return view("admin/index/naoautorizado", $data);
    }
}
