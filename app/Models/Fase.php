<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends RModel
{
    use HasFactory;
    protected $table = "fases";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['descricao'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
