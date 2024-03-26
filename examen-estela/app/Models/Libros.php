<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'pagina'
      
    ];

    public function usuario()
    {
        return $this->hasOne(Libro::class, 'id_libros');
    }

    public function libroAutores()
    {
        return $this->hasMany(Libro::class, 'id_libros')->with('autors');
    }
}