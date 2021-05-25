<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\Models\Acesso;
class LoginController extends Controller
{
    public function index(Request $request){
        $data = [];

        if($request->isMethod("POST")){
            $username = $request->input("username", "");
            $password = $request->input("password", "");

            if (Auth::attempt(['login' => $username, 'password' => $password, 'status' => 1])) {
                $request->session()->regenerate();
                $user = \Auth::user();

                $dbRotas = Acesso::join("url", "url.id", "=", "acesso.url_id")
                    ->where("url.status", 1)
                    ->where("acesso.perfil_id", $user->perfil_id)
                    ->get(['rota'])
                    ->toArray();

                $listaRotas = array_map(function($value){
                    return $value["rota"];
                }, $dbRotas);
                
                $request->session()->put('rotas', $listaRotas);

                return redirect()->route('admin.home');
            }else{
                $request->session()->flash('error', 'Login / Senha inválidos');
            }
        }
        
        return view("login");
    }

    public function esqueceuSenha(Request $request){
        return view("esqueceu-senha");
    }
}
