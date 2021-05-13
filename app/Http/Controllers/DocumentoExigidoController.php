<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentoExigido;
class DocumentoExigidoController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = DocumentoExigido::all();

        $data["obj"] = new DocumentoExigido();
        if($id != 0){
            $data["obj"] = DocumentoExigido::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $documento = $req->input("documento", "");

                if($documento == ""){
                    $req->session()->flash('error', 'Documento não pode ser vazio!');
                    return redirect()->route('admin.objeto.index');
                }

                $query = DocumentoExigido::where("documento", $documento);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new DocumentoExigido();
                    if($id != 0) $obj = DocumentoExigido::find($id);
                    
                    $obj->documento = $documento;
                    $obj->save();
                    $req->session()->flash('success', 'Documento salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Documento não salvo');
            }

            return redirect()->route('admin.documento_exigido.index');
        }

        return view("admin/documento_exigido/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = DocumentoExigido::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Documento deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Documento não deletado');
        }

        return redirect()->route('admin.documento_exigido.index');
    }
}