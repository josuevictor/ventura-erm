<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empresa extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'cnpj', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function getAuthPassword()
//    {
//        return $this->senha;
//    }
}
