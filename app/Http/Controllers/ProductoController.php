<?php

namespace App\Http\Controllers; //locacion del controlador 

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Services\ProductoService; 
use App\Services\CategoriaService; 
use App\Services\ProveedorService; 

class ProductoController extends Controller
{
    public function index( ProductoService $productService, CategoriaService $categoriaService, ProveedorService $proveedorService)
    { //recibe instancias de la lista productos, categorias, proveedores 
        $productos = $productService->getProducto();
        $categorias = $categoriaService->getCategorias();
        $proveedores = $proveedorService->getProveedores();
        return view('home', compact('productos', 'categorias', 'proveedores')); //Retorna la vista en home para que productos, categorias, proveedores se puedan usar en la vista
    }


    public function createProducto(Request $request) //metodo 
    {
        $validate = $request->validate([ //valida los datos de la solicitud 
            'nombre' => 'required|unique:productos|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|numeric|exists:categorias,id',
            'proveedor_id' => 'required|numeric|exists:proveedores,id',
        ]);

        Producto::create($validate); //Crea un nuevo producto con los datos validados 
        return redirect()->route('productos.index'); //Redirección a la ruta 
    }

    public function setProducto(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);
        Producto::where('id', $id)->update($validate); //Actualiza el producto con los datos validados 
        return redirect()->route('productos.index'); //Regirige a la ruta 
    }

    public function deleteProducto($id) //Elimina el producto con el id proporcionado 
    {
        Producto::destroy($id); 
        return redirect()->route('productos.index'); //Redirección 
    }
}
