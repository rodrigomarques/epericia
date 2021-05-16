<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends RModel
{
    use HasFactory;
    protected $table = "perfil";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['nome', 'status'];

    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
