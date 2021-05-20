<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Usuario;
use App\Models\Url;
class UsuarioController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["listaPerfil"] = Perfil::where("status", 1)->get();

        $data["obj"] = new Usuario();
        if($id != 0){
            $data["obj"] = Usuario::find($id);
        }

        if($req->isMethod("POST")){
            try{
                
                $user = new Usuario($req->all());
                $idUser = $req->input("id", "");
                if($id != ""){
                    $user = Usuario::find($idUser);
                    $user->fill($req->all());
                }
                $user->perfil_id = $req->input("idperfil", null);

                $userExists = Usuario::where("status", 1)->where("login", $user->login)->first();

                if($userExists && $userExists->id != $user->id){
                    $req->session()->flash('error', 'Usuário já cadastrado no sistema');    
                    return redirect()->route('admin.usuario.index');
                }

                $user->password = \Hash::make($req->input("senha"));
                $user->status = 1;
                $user->save();

                $req->session()->flash('success', 'Usuário cadastrado com sucesso');

            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Usuário não salvo');
            }

            return redirect()->route('admin.usuario.index');
        }

        return view("admin/usuario/index", $data);
    }

    public function buscar($id = 0, Request $req){
        $data = [];
        $data["listaPerfil"] = Perfil::where("status", 1)->get();

        if($req->isMethod("POST")){
            try{
                $perfil = $req->input("idperfil", "");
                $login = $req->input("login", "");

                $query = Usuario::where("status", 1);
                if($perfil != "")
                    $query = $query->where("perfil_id", $perfil);

                if($login != "")
                    $query = $query->where("login", "like", "%".$login."%");

                $data["lista"] = $query->get();

            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Perícia não salvo');
            }

        }

        return view("admin/usuario/buscar", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Usuario::find($id);
            $obj->status = 0;
            $obj->save();
            $req->session()->flash('success', 'Usuário deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Usuário não deletado');
        }

        return redirect()->route('admin.usuario.index');
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

    public function access(Request $req){
        $data = [];
        $lista = Url::where("status", 1)->orderBy("group", "asc")->get();

        $listaUrl = [];
        foreach($lista as $url){
            $itemAtual = isset($listaUrl[$url->group])?$listaUrl[$url->group]:[];
            $listaUrl[$url->group] = array_merge($itemAtual, [$url]);
        }

        $data["listaUrl"] = $listaUrl;
        return view("admin/usuario/acesso", $data);
    }
}
