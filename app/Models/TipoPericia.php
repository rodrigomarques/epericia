<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPericia extends RModel
{
    use HasFactory;
    protected $table = "tipo_pericia";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['tipo'];
    
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
