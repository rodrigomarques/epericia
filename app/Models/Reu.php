<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reu extends RModel
{
    use HasFactory;
    protected $table = "reu";
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = ['nome', 'processo_id'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
