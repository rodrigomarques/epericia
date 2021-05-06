<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(Request $req){
        $data = [];

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");
                $objExists = Tag::where("descricao", $descricao)->first();

                if(!$objExists){
                    $obj = new Tag();
                    $obj->descricao = $descricao;
                    $obj->save();
                    $req->session()->flash('success', 'Tag salva com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Tag não salva');
            }

            return redirect()->route('admin.tags.index');
        }

        return view("admin/tags/index", $data);
    }
}
