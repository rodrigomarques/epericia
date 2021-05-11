<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPericia;

class TipoPericiaController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = TipoPericia::all();

        $data["obj"] = new TipoPericia();
        if($id != 0){
            $data["obj"] = TipoPericia::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $tipo = $req->input("tipo", "");

                if($tipo == ""){
                    $req->session()->flash('error', 'Tipo de Perícia não pode ser vazia!');
                    return redirect()->route('admin.objeto.index');
                }

                $query = TipoPericia::where("tipo", $tipo);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new TipoPericia();
                    if($id != 0) $obj = TipoPericia::find($id);
                    
                    $obj->tipo = $tipo;
                    $obj->save();
                    $req->session()->flash('success', 'Tipo de Perícia salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Perícia não salvo');
            }

            return redirect()->route('admin.tipo_pericia.index');
        }

        return view("admin/tipo_pericia/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = TipoPericia::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Tipo de Perícia deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Tipo de Perícia não deletado');
        }

        return redirect()->route('admin.tipo_pericia.index');
    }
}
