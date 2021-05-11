<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fase;

class FaseController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = Fase::all();

        $data["obj"] = new Fase();
        if($id != 0){
            $data["obj"] = Fase::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");
                if($descricao == ""){
                    $req->session()->flash('error', 'Descrição não pode ser vazia!');
                    return redirect()->route('admin.fases.index');
                }
                
                $query = Fase::where("descricao", $descricao);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Fase();
                    if($id != 0) $obj = Fase::find($id);

                    $obj->descricao = $descricao;
                    $obj->save();
                    $req->session()->flash('success', 'Fase salva com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Fase não salva');
            }

            return redirect()->route('admin.fases.index');
        }

        return view("admin/fases/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Fase::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Fase deletada com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Fase não deletada');
        }

        return redirect()->route('admin.fases.index');
    }
}
