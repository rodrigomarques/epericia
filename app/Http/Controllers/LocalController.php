<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = Local::where("status", 1)->get();

        $data["obj"] = new Local();
        if($id != 0){
            $data["obj"] = Local::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $nome = $req->input("nome", "");
                if($nome == ""){
                    $req->session()->flash('error', 'Nome não pode ser vazia!');
                    return redirect()->route('admin.local.index');
                }

                $query = Local::where("nome", $nome)->where("status", 1);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Local();
                    if($id != 0) $obj = Local::find($id);

                    $obj->status = 1;
                    $obj->nome = $nome;
                    $obj->save();
                    $req->session()->flash('success', 'Local salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Local não salva');
            }

            return redirect()->route('admin.local.index');
        }

        return view("admin/local/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Local::find($id);
            $obj->status = 0;
            $obj->save();
            $req->session()->flash('success', 'Local deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Local não deletado');
        }

        return redirect()->route('admin.local.index');
    }
}
