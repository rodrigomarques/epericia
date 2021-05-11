<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = Tag::all();

        $data["obj"] = new Tag();
        if($id != 0){
            $data["obj"] = Tag::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");
                if($descricao == ""){
                    $req->session()->flash('error', 'Descrição não pode ser vazia!');
                    return redirect()->route('admin.tag.index');
                }

                $query = Tag::where("descricao", $descricao);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Tag();
                    if($id != 0) $obj = Tag::find($id);

                    $obj->descricao = $descricao;
                    $obj->save();
                    $req->session()->flash('success', 'Tag salva com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tag não salva');
            }

            return redirect()->route('admin.tag.index');
        }

        return view("admin/tags/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Tag::find($id);
            $obj->delete();
            $req->session()->flash('success', 'Tag deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Tag não deletado');
        }

        return redirect()->route('admin.tag.index');
    }
}
