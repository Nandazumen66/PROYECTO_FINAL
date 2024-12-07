<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; //Importacion de los controladores 
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Services\ProductoService;


Route::get('/', function () {//Define la ruta get como raiz de la aplicacion /. Esta nos retorna a welcome 
    return view('welcome');
});

Route::get('/home', [ProductoController::class, 'index'])->name('home'); //Define una ruta llamada get para home a traves del metodo index, la ruta se llama home
Route::post("/home/add", [ProductoController::class, 'createProducto'])->name('add.product'); //Define una ruta llamada post que llama al metodo addProducto y la ruta se llama add_product
Route::get("/home/edit{id}", [ProductoController::class, 'updateProducto'])->name('editar.producto');//Define una ruta get que llama al metodo update del productocontroller y su nombre es editar
Route::get("/home/delete{id}", [ProductoController::class, 'deleteProducto'])->name('eliminar.producto');//Deifine una ruta get que llama al metodo delete del producto controller y su nombre es eliminar

Route::get("/proveedor", [ProveedorController::class, 'index'])->name('proveedor'); //Define una ruta get para proveedor que llama al metodo index del ProveedorController y la ruta se nombra proveedor
Route::post("/proveedor", [ProveedorController::class, 'createProveedor'])->name('add.proveedor');
Route::get("/proveedor/edit{id}", [ProveedorController::class, 'updateProveedor'])->name('proveedores.edit');
Route::post("/proveedor/edit{id}", [ProveedorController::class, 'updateProveedorView'])->name('proveedores.edit.view');
Route::get("/proveedor/delete{id}", [ProveedorController::class, 'deleteProveedor'])->name('proveedores.destroy');//Define una ruta get para proveedor a traves del metodo createproveedor del ProveedorController y su nombre es add_proveedor

Route::get("/categoria", [CategoriaController::class, 'index'])->name('categoria');
Route::post("/categoria", [CategoriaController::class, 'createCategoria'])->name('add.categoria');
Route::get("/categoria/edit{id}", [CategoriaController::class, 'updateCategoria'])->name('categoria.edit');
Route::post("/categoria/edit{id}", [CategoriaController::class, 'updateCaregoriaView'])->name('categoria.edit.view');
Route::get("/categoria/delete{id}", [CategoriaController::class, 'deleteCategoria'])->name('categoria.destroy');


Route::get('/dashboard', function () { //establecemos una ruta que devuelve a dashborard que solo puede ser vista por usuarios atentificados o verificados 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { //Agrupa varias rutas que requieren autentificacion que solo pueden ser accedidas por usuarios que sean autenticados 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php'; //Incluye al archivo auth.php que contiene todas las rutas de autentificacion realizadas por laravel 
