<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',

    ];

    public function usuarioPedido()
    {
        $this->hasMany(Usuario::class, 'id_usuarios');
    }
}