<?php
namespace App\Services;

use App\Models\Producto; //Importacion de modelo 

class ProductoService {
    public function getProducto() { //Crear un metodo dentro de la clase
        // Lógica para obtener productos
        return Producto::all();//Traer todo el listado que haya en la tabla 
    }
}
?>
