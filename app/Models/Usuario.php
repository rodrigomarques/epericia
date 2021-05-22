<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class Usuario extends RModel implements Authenticatable
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

    public function getAuthIdentifier() {
        return $this->id;
    }

    public function getAuthIdentifierName() {
        return "id";
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }
}
