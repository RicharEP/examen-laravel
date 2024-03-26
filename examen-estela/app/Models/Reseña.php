<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reseña extends Model
{
    use HasFactory;

    protected $fillable = [
        ''
      
    ];



    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_usuarios');
    }
    public function libros()
    {
        return $this->hasOne(Libro::class, 'id_libros');
    }

    public function libroAutores()
    {
        return $this->hasMany(Libro::class, 'id_libros')->with('autors');
    }
}