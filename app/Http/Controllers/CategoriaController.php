<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller //Se hereda con las funcionalidades de Controller
{
    public function index(){
        $categorias = Categoria::all(); //Obtiene los registros de la tabla Categoria
        return view("categorias", compact("categorias"));//Los prepara para mandarlos a la vista 
    }

    public function createCategoria(Request $request){ //Realizamos la solicitud para crear una Categoria
        $validate = $request->validate([ //Validamos los datos a continuacion...
            'nombre' => 'required|unique:categorias|max:100',
            'descripcion' => 'required|max:255'
        ]);

        Categoria::create($validate);
        return redirect()->route('categoria')->with('status', 'Categoria creada con exito'); //Si la validacion es correcta se crea la nueva categoria 
    }

    public function updateCategoria(Request $request, $id) //Solicitud para actualizar categoria 
    {
        $validate = $request->validate([//Validacion de categoria co
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:255'
        ]);
        Categoria::where('id', $id)->update($validate);
        return redirect()->route ('categoria')->with('status', 'Categoria modificada con exito'); //Habiendo validado, se realiza la actualizacion a traves de un id
    }

    public function updateCategoriaView($id) //Actualizar un proveedor existente 
    {
        $categoria = Categoria::find($id); //Valida los datos de la solicitud 
        return view ('categoria.edit.view', compact('categoria'));
        
        Categoria::where('id', $request->id)->update($categoria); //Actualiza el proveedor con los datos dados
    }

    public function deleteCategoria($id){ //Solicitud para eliminar categoria a traves de id
        Categoria::destroy($id); // Eliminacion de categoria 
        return redirect()->route('categoria')->with('status', 'Categoria eliminada con exito');
    }
}
