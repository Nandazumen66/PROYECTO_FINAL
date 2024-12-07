<?php

namespace App\services;

use Illuminate\Http\Request;
use App\Models\Proveedor; //Importacion de Modelo



class ProveedorService
{

    public function getProveedores() //Crear el metodo dentro de la clase que llamaremos en controllers 
    {
        $proveedor = Proveedor::all(); //Metodo estatico del modelo proveedor para obtener los datos de la tabla proveedor
        return $proveedor; //Retorna la coleccion de proveedores 
    }
}
