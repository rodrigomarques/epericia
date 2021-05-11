<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $listaTags = Tag::all();
        $data["lista"] = TipoDocumento::all();

        $data["obj"] = new TipoDocumento();
        if($id != 0){
            $data["obj"] = TipoDocumento::find($id);
        }

        if($req->isMethod("POST")){
            try{
                
                $tipo = $req->input("tipo", "");
                $tag = $req->input("tag", "");
                $quillhtml = $req->input("quill-html", "");

                if($tipo == ""){
                    $req->session()->flash('error', 'Descrição não pode ser vazia!');
                    return redirect()->route('admin.tipo_documento.index');
                }

                $obj = new TipoDocumento();
                if($id != 0) $obj = TipoDocumento::find($id);
                
                $obj->tipo = $tipo;
                $obj->tag_id = $tag == ""?null:$tag;
                $obj->texto = $quillhtml;
                
                $obj->save();
                $req->session()->flash('success', 'Tipo de Documento salvo com sucesso');
                
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Documento não salvo');
            }

            return redirect()->route('admin.tipo_documento.index');
        }

        $data["listaTag"] = $listaTags;
        return view("admin/tipo_documento/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = TipoDocumento::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Tipo de Documento deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Tipo de Documento não deletado');
        }

        return redirect()->route('admin.tipo_documento.index');
    }
}
