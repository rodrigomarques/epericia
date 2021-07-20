<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Processo;
use App\Models\Autor;
use App\Models\Reu;
use App\Models\Local;
use App\Models\Vara;

use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function index($id = 0, Request $req)
    {
        $data = [];
        $data["lista"] = [];
        $data["listaObj"] = Objeto::all();
        $data["listaVara"] = Vara::where("status", 1)->get();
        $data["listaLocal"] = Local::where("status", 1)->get();


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
                $processo->status = "ATV";
                $processo->save();

                $vAutor = $req->input("autor", []);
                $vReu = $req->input("reu", []);

                if(count($vAutor) > 0){
                    foreach($vAutor as $at){
                        if(trim($at) == "") continue;
                        $autor = Autor::where("processo_id", $processo->id)->where("nome", $at)->first();
                        if ($autor == null) {
                            $autor = new Autor();
                        }
                        $autor->processo_id = $processo->id;
                        $autor->nome = $at;

                        $autor->save();
                    }
                }

                if(count($vReu) > 0){
                    foreach($vReu as $pReu){
                        if(trim($pReu) == "") continue;
                        $reu = Reu::where("processo_id", $processo->id)->where("nome", $pReu)->first();
                        if ($reu == null) {
                            $reu = new Reu();
                        }

                        $reu->processo_id = $processo->id;
                        $reu->nome = $pReu;
                        $reu->save();
                    }
                }

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
        $data["n_processo"] = "";
        $queryProcesso = Processo::where("status", "ATV");

        if ($req->isMethod("POST")) {
            $numProcesso = $req->input("n_processo", "");

            $queryProcesso = $queryProcesso->where("num_processo", "like", "%" . $numProcesso . "%");
            $data["n_processo"] = $numProcesso;
        }

        $data["lista"] = $queryProcesso->orderBy("created_at", "desc")->limit(100)->get();

        return view("admin/processo/buscar", $data);
    }

    public function delete(Request $req){
        try {
            $obj = Processo::find($id);
            $obj->status = "DEL";
            $obj->save();
            $req->session()->flash('success', 'Processo deletado com sucesso');
        } catch (\Exception $e) {
            \Log::error("ERROR", [$e->getMessage()]);
            $req->session()->flash('error', 'Processo não deletado');
        }

        return redirect()->route('admin.processo.buscar');

    }

    public function pericia(Request $req, $id = 0, $processo = ""){
        $processo = Processo::where("num_processo", $processo)
                        ->where("status", "ATV")
                        ->where("id", $id)
                        ->first();
        if($processo == null){
            $req->session()->flash('error', 'Processo não encontrado');
            return redirect()->route('admin.processo.buscar');
        }
    }
}
