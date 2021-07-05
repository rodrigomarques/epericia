<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends RModel
{
    use HasFactory;
    protected $table = "autor";
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = ['nome', 'processo_id'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
