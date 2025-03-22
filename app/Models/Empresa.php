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

// Relacionamento com os usuários
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'empresa_id');
    }
}
