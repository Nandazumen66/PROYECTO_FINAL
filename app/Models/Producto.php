<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ["nombre", "precio", "stock", "id_categoria", "id_proveedor"];
}
