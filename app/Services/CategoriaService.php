<?php
namespace App\Services; //Directorio de ubicacion

use App\Models\Categoria; //Importacion de modelo

class CategoriaService {
    public function getCategorias() { //Defincion de metodo dentro de la clase 
        return Categoria::all(); //Metodo estatico all() para obtener todos los registros presentes en la tabla 
    }
}
?>
