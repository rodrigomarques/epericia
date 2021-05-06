<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends RModel
{
    use HasFactory;
    protected $table = "tipo_documentos";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['tipo', 'texto', 'tag_id'];
    
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
