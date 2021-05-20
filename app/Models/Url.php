<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends RModel
{
    use HasFactory;
    protected $table = "url";
    public $timestamps = false;
    public $incrementing = TRUE;
    protected $fillable = ['titulo', 'rota', 'group', 'status'];

    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
