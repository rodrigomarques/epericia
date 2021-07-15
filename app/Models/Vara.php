<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vara extends RModel
{
    use HasFactory;
    protected $table = "vara";
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = ['nome', 'status'];

    protected $rules = [

    ];

    protected $messages = [

    ];
}
