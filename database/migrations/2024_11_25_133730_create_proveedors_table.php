<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedors', function (Blueprint $table) { //Definir una nueva tabla llamada proveedors 
            //Luego, define una funcion que recibe un objeto para definir las columnas y propiedades en una tabla
            $table->id();
            $table->string("nombre", 30)->unique(); 
            $table->string("direccion", 50);
            $table->string("telefono", 15)->unique(); 
            $table->string("email", 30)->unique(); 
            $table->string("contacto", 30);
            $table->string("descripcion", 100)->nullable();
            $table->timestamps(); //Marcas de tiempo para cuando se actualiza o se crea una tabla 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //Nos declara que no tiene ningun valor 
    {
        Schema::dropIfExists('proveedors');
    } //metodo para eliminar la tabla proveedores si ya existe en la base de datos
};
