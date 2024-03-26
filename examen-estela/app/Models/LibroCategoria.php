<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroCategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'pedido_id'
    ];

    public function librocategoria()
    {
        $this->belongsTo(Libro::class, 'id_libroscategorias', 'id');
    }


    public function libros()
    {
        $this->hasMany(Libro::class, 'id_libros');
    }
}