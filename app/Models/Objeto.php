<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends RModel
{
    use HasFactory;
    protected $table = "objetos";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['descricao'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
