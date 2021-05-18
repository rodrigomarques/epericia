<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends RModel
{
    use HasFactory;
    protected $table = "usuarios";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['nome', 'login', 'password', 'email', 'status', 'perfil_id'];

    protected $rules = [
        
    ];

    protected $messages = [
        
    ];

    public function perfil(){
        return $this->belongsTo(Perfil::class, "perfil_id");
    }
}
