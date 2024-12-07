<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model //Categoria hereda la funcionalidad de Model 
{
    protected $fillable = ["nombre", "descripcion"]; // Define un arreglo con las columnas de la tabla categoria 
}
