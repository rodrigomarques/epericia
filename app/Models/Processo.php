<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Processo extends RModel
{
    use HasFactory;
    protected $table = "processos";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['num_processo', 'origem', 'justica_gratuita', 'estado_processo', 'objeto_id', 'local'
        , 'cidade_processo', 'vara', 'peticao_inicial', 'contestacao', 'resumo', 'ajuizamento', 'citacao'];

    protected $rules = [

    ];

    protected $messages = [

    ];

    public function objeto(){
        return $this->belongsTo(Objeto::class, "objeto_id");
    }

}
