<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{ 
    public function index(){ //mostrar lista de proveedores 
        $proveedores = Proveedor::all(); //obtiene los registros de la tabla proveedores 
        return view("proveedores", compact("proveedores")); //Realiza el retorno para que pueda ser mostrado en la vista 
    }

    public function createProveedor(Request $request){ //Crear un nuevo proveedor 
        $validate = $request->validate([ //Valida los datos de la solicitud 
            'nombre' => 'required|unique:proveedors|max:100',
            'direccion' => 'required|unique:proveedors|max:50',
            'telefono' => 'required|unique:proveedors|max:30',
            'correo' => 'required|unique:proveedors|max:200',
            'contacto' => 'required|unique:proveedors|max:200',
            'descripcion' => 'required|unique:proveedors|max:200'
        ]);

        // Agregar lógica para crear proveedor si es necesario
        Proveedor::create($validate); 
        return redirect()->route('proveedor')->with('status', 'Proveedor creado con exito');//Crea un nuevo proveedor con los datos validados 
    }

    public function updateProveedor(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'contacto' => 'required',
            'descripcion' => 'required',
        ]);
        Proveedor::where('id', $id)->update($validate);
        return redirect()->route ('proveedor')->with('status', 'Proveedor modificado con exito');
    }
    public function updateProveedorView($id) //Actualizar un proveedor existente 
    {
        $proveedor = Proveedor::find($id); //Valida los datos de la solicitud 
        return view ('proveedores.edit', compact('proveedor'));
        
        Proveedor::where('id', $request->id)->update($proveedor); //Actualiza el proveedor con los datos dados
    }

    public function deleteProveedor($id){ //Solicitud para eliminar el proveedor a traves de un id 
        Proveedor::destroy($id); //Elimina el proveedor
    }
}
