<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoriaService;
use App\Services\ProductoService;
use App\Services\ProveedorService;


class ProfileController extends Controller
{
    protected $categoriaService; //Propiedad protegida para Categoria Service
    protected $productoService;// Propiedad protegida para producto Service 
    protected $proveedorService; // Propiedad protegida para Proveedor service 

    public function __construct(CategoriaService $categoriaService, ProductoService $productoService, ProveedorService $proveedorService)
    {//Define el constructor de la clase que se define cuando se crea una isntancia en el controlador 
        $this->categoriaService = $categoriaService; //Instancias de los servicios pasados como parametros a las propiedades de la clase 
        $this->productoService = $productoService;
        $this->proveedorService = $proveedorService;
    }

    public function index() //Mostrar en la vista 
    {
        $categorias = $this->categoriaService->getCategorias(); //Llama al metodo getCategorias para obtener la lista de categorias 
        $productos = $this->productoService->getProducto();
        $proveedores = $this->proveedorService->getProveedores();

        return view('profile.index', compact('categorias', 'productos', 'proveedores')); //Quedan compactadas para usar en la vista 
    }

    // Otros métodos relacionados con ProfileController...
}

//Controlador relacionado a la vista y perfil 