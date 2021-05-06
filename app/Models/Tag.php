<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends RModel
{
    use HasFactory;
    protected $table = "tag";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['descricao'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
