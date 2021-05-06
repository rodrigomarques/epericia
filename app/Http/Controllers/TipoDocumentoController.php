<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TipoDocumentoController extends Controller
{
    public function index(Request $req){
        $data = [];
        $listaTags = Tag::all();

        if($req->isMethod("POST")){
            try{
                dd($req->input("quill-html"));
                
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tipo de Documento não salvo');
            }

            return redirect()->route('admin.tipo_documento.index');
        }

        $data["listaTag"] = $listaTags;
        return view("admin/tipo_documento/index", $data);
    }
}
