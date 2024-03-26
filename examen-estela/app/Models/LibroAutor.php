<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroAutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'pedido_id'
    ];

    public function libroautors()
    {
        $this->belongsTo(Autor::class, 'id_libroautors', 'id');
    }

    public function libro()
    {
        $this->belongsTo(Libro::class, 'id_libros', 'id');
    }

    public function libros()
    {
        $this->hasMany(Libro::class, 'id_libros');
    }
}