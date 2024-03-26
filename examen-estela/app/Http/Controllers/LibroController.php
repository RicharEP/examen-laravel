<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\LibroAutor;
use App\Models\Autor;

class LibroController extends Controller
{
   
    public function index()
    {
        $libros = Libro::with(['libroAutor'])->get();
        return $libros;
    }

   
    public function show($id)
    {
        $libro = Libro::with(['libroAutor'])->find($id);

        if (is_null($libro)) {
            return 'El libro buscado no existe';
        }

        return $libro;
    }


    public function store(Request $request)
    {
        $params = $request->all();
        $libro = Libro::create([
            'titulo' => $params['titulo'],
            'pagina' => $params['pagina'],
          
        ]);

   

     
        if (isset($params['autors']) && is_array($params['autors'])) {
            foreach ($params['autors'] as $key => $autor) {
                if (isset($autor['id'])) {
                    LibroAutor::create([
                        'id_libros' => $libro->id,
                        'id_autors' => $autor['id']
                    ]);
                } else {
                    $autorObj = Autor::create([
                        'nombre' => $autor['nombre'],
                    
                    ]);

                    LibroAutor::create([
                        'id_libros' => $libro->id,
                        'id_autors' => $autorObj->id
                    ]);
                }
            }
        }

        return $libro;
    }

  
    public function update($id, Request $request)
    {
        $params = $request->all();
        $libro = Libro::find($id)->update([
            'titulo' => $params['titulo'],
            'pagina' => $params['pagina'],
        ]);

        return $libro ? 'El libro fue actualizado.': 'Error al actualizar.';
    }

 
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        if ($libro) {
            return 'Libro eliminado.';
        } else {
            return 'No se pudo eliminar.';
        }
    }

}