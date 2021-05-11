<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;

class ObjetoController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = Objeto::all();

        $data["obj"] = new Objeto();
        if($id != 0){
            $data["obj"] = Objeto::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");

                if($descricao == ""){
                    $req->session()->flash('error', 'Descrição não pode ser vazia!');
                    return redirect()->route('admin.objeto.index');
                }

                $query = Objeto::where("descricao", $descricao);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Objeto();
                    if($id != 0) $obj = Objeto::find($id);
                    
                    $obj->descricao = $descricao;
                    $obj->save();
                    $req->session()->flash('success', 'Objeto salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Objeto não salvo');
            }

            return redirect()->route('admin.objeto.index');
        }

        return view("admin/objeto/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Objeto::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Objeto deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Objeto não deletado');
        }

        return redirect()->route('admin.objeto.index');
    }
}
