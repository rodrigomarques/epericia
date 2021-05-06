<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fase;

class FaseController extends Controller
{
    public function index(Request $req){
        $data = [];

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");
                $objExists = Fase::where("descricao", $descricao)->first();

                if(!$objExists){
                    $obj = new Fase();
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
}
