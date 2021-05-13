<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        
        if($req->isMethod("POST")){
            try{
                
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Perícia não salvo');
            }

            return redirect()->route('admin.usuario.index');
        }

        return view("admin/usuario/index", $data);
    }

    public function buscar($id = 0, Request $req){
        $data = [];
        
        if($req->isMethod("POST")){
            try{
                
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Perícia não salvo');
            }

        }

        return view("admin/usuario/buscar", $data);
    }
}
