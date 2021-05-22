<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $data = [];

        return view("admin/index/index", $data);
    }

    public function sair() {
        return redirect()->route('home');
    }
}
