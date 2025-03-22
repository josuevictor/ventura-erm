<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'password', 'empresa_id',
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

//    public function getAuthPassword()
//    {
//        return $this->senha;
//    }
}
