<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;

class ObjetoController extends Controller
{
    public function index(Request $req){
        $data = [];

        if($req->isMethod("POST")){
            try{
                $descricao = $req->input("descricao", "");
                $objExists = Objeto::where("descricao", $descricao)->first();

                if(!$objExists){
                    $obj = new Objeto();
                    $obj->descricao = $descricao;
                    $obj->save();
                    $req->session()->flash('success', 'Objeto salvo com sucesso');
                }
            }catch(\Exception $e){
                \Log::error("ERROR", [ $e->getMessage()]);
                $req->session()->flash('error', 'Objeto não salvo');
            }

            return redirect()->route('admin.objeto.index');
        }

        return view("admin/objeto/index", $data);
    }
}
