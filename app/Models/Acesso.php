<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends RModel
{
    use HasFactory;
    protected $table = "acesso";
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['usuario_id', 'perfil_id'];

    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
