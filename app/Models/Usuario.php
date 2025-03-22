<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'senha', 'empresa_id', // Adicione outros campos aqui
    ];

    protected $hidden = [
        'senha', 'remember_token', // Esconda a senha e o token de lembrete
    ];

    public function getAuthPassword()
    {
        return $this->senha; // Informe ao Laravel que o campo de senha é `senha`
    }
}
