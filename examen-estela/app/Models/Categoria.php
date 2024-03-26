<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_categoria'
      
    ];



    public function libroCategoria()
    {
        return $this->hasMany(Libro::class, 'id_libros')->with('categorias');
    }
}