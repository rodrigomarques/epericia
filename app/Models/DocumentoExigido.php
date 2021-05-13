<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoExigido extends RModel
{
    use HasFactory;
    protected $table = "documento_exigido";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['documento'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
