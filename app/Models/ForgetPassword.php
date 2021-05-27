<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends RModel
{
    use HasFactory;

    protected $table = "forget_password";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['email', 'hash', 'dt_validate', 'status', 'usuario_id'];
        
    protected $rules = [
        
    ];

    protected $messages = [
        
    ];
}
