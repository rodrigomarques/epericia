<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\Models\Acesso;
use App\Models\Usuario;
use App\Models\ForgetPassword;
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
        if($request->isMethod("POST")){
            $email = $request->input("email", "");
            
            $user = Usuario::where("email", $email)->where("status", 1)->first();
            if(!$user){
                //$request->session()->flash('error', 'E-mail não encontrado ou usuário inativo');
                //return redirect()->route('esqueceu-senha');
            }

            \DB::update("update forget_password set status = 0 where email = ?", [$user->email]);

            $umDia = new \DateTime;
            $umDia->add(new \DateInterval('P1D'));

            $hash = \Hash::make(str_random(8));

            $forget = new ForgetPassword;
            $forget->email = $user->email;
            $forget->hash = $hash;
            $forget->dt_validate = $umDia->format("Y-m-d H:i:s");
            $forget->status = 1;
            $forget->usuario_id = $user->id;

            $user = new \App\Models\Usuario;
            $user->email = "marques.coti@gmail.com";
            $email = $user->email;
            \Mail::send("email.forget-password", ["email" => "marques.coti@gmail.com", 'hash' => $hash],
            function($message) use ($email){
                $from = env("MAIL_TO", "contato@epericia.net.br");
                $message->from($from);
                $message->to($email);
                $message->subject("E-Pericia -- Reset de Senha");
            });
            
        }
        return view("esqueceu-senha");
    }
}
