<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Processo;
use App\Models\Autor;
use App\Models\Reu;


use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function index($id = 0, Request $req)
    {
        $data = [];
        $data["lista"] = [];
        $data["listaObj"] = Objeto::all();

        if ($req->isMethod("POST")) {
            try {

                $processo = Processo::where("num_processo", $req->input("num_processo"))->first();
                if($processo == null){
                    $processo = new Processo();
                }

                $processo->fill($req->all());
                $processo->objeto_id = $req->input("objeto");

                $processo->ajuizamento = null;
                $processo->citacao = null;

                $dtAjuizamento = $req->input("ajuizamento", "");
                if($dtAjuizamento != ""){
                    $ajuizamento = \Carbon\Carbon::createFromFormat('d/m/Y', $dtAjuizamento);
                    $processo->ajuizamento = $ajuizamento->format("Y-m-d");
                }

                $dtcitacao = $req->input("citacao", "");
                if($dtcitacao != ""){
                    $citacao = \Carbon\Carbon::createFromFormat('d/m/Y', $dtcitacao);
                    $processo->citacao = $citacao->format("Y-m-d");
                }

                $processo->save();

                $vAutor = $req->input("autor", []);
                $vReu = $req->input("reu", []);

                $autor = Autor::where("processo_id", $processo->id)->first();
                if($autor == null){
                    $autor = new Autor();
                }
                $autor->processo_id = $processo->id;
                $autor->nome = $vAutor[0];

                $autor->save();

                $reu = Reu::where("processo_id", $processo->id)->first();
                if($reu == null){
                    $reu = new Reu();
                }

                $reu->processo_id = $processo->id;
                $reu->nome = $vReu[0];

                $reu->save();
                $req->session()->flash('success', 'Processo inserido com sucesso');


            } catch (\Exception $e) {
                \Log::error("ERROR", [$e->getMessage()]);
                $req->session()->flash('error', 'Processo não salvo');
            }

            return redirect()->route('admin.processo.index');
        }

        return view("admin/processo/index", $data);
    }

    public function buscar(Request $req){
        $data = [];

        $data["lista"] = Processo::all();

        return view("admin/processo/buscar", $data);

    }
}
