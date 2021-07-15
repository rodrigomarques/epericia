<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vara;

class VaraController extends Controller
{
    public function index($id = 0, Request $req){
        $data = [];
        $data["lista"] = Vara::where("status", 1)->get();

        $data["obj"] = new Vara();
        if($id != 0){
            $data["obj"] = Vara::find($id);
        }

        if($req->isMethod("POST")){
            try{
                $nome = $req->input("nome", "");
                if($nome == ""){
                    $req->session()->flash('error', 'Nome não pode ser vazia!');
                    return redirect()->route('admin.local.index');
                }

                $query = Vara::where("nome", $nome)->where("status", 1);
                if($id != 0) $query = $query->where("id", "!=", $id);
                $objExists = $query->first();

                if(!$objExists){
                    $obj = new Vara();
                    if($id != 0) $obj = Vara::find($id);

                    $obj->status = 1;
                    $obj->nome = $nome;
                    $obj->save();
                    $req->session()->flash('success', 'Vara salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Vara não salva');
            }

            return redirect()->route('admin.vara.index');
        }

        return view("admin/vara/index", $data);
    }

    public function delete($id = 0, Request $req){
        try{
            $obj = Local::find($id);
            $obj->status = 0;
            $obj->save();
            $req->session()->flash('success', 'Vara deletado com sucesso');
        }catch(\Exception $e){
            \Log::error("ERROR", [ $e->getMessage()]);
            $req->session()->flash('error', 'Vara não deletado');
        }

        return redirect()->route('admin.vara.index');
    }
}
