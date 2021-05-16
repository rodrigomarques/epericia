<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
class UsuarioController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["listaPerfil"] = Perfil::where("status", 1)->get();
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

    public function perfil($id = 0, Request $req){
        $data = [];

        $data["lista"] = Perfil::where("status", 1)->get();

        $data["obj"] = new Perfil();
        if($id != 0){
            $data["obj"] = Perfil::find($id);
        }
        
        if($req->isMethod("POST")){
            try{
                $nome = $req->input("nome", "");

                if($nome == ""){
                    $req->session()->flash('error', 'Descrição não pode ser vazia!');
                    return redirect()->route('admin.objeto.index');
                }

                $query = Perfil::where("nome", $nome);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $query = $query->where("status", 1);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Perfil();
                    if($id != 0) $obj = Perfil::find($id);
                    
                    $obj->nome = $nome;
                    $obj->status = 1;
                    $obj->save();
                    $req->session()->flash('success', 'Perfil salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Perfil não salvo');
            }

            return redirect()->route('admin.usuario.perfil');
        }

        return view("admin/usuario/perfil", $data);
    }

    public function perfilDelete($id = 0, Request $req){
        try{
            $obj = Perfil::find($id);
            $obj->status = 0;
            $obj->save();
            $req->session()->flash('success', 'Perfil deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Perfil não deletado');
        }

        return redirect()->route('admin.usuario.perfil');
    }
}
