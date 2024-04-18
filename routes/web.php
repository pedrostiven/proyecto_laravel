<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CrudController::class, "index"])->name("crud.index");

//ruta para añadir un nuevo producto
Route::post("/registrar-producto", [CrudController::class, "create"])->name("crud.create");

//ruta para modificar un producto
Route::post("/modificar-producto", [CrudController::class, "update"])->name("crud.update");

//ruta para elminar productos
Route::get("/eliminar-producto-{id}", [CrudController::class, "delete"])->name("crud.delete");
