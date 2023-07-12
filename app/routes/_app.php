<?php


app()->get("/", function () {
    response()->json(["message" => "Bienvenido Alvaro!"]);
});

// CONSULTAR TODO LOS DATOS
app()->get("/contactos", 'ContactosController@index');

// CONSULTAR UN REGISTRO
app()->get("/contacto/{id}", 'ContactosController@edit');

// CREAR UN NUEVO REGISTRO
app()->post("/contacto", 'ContactosController@store');

// ELIMINAR UN REGISTRO
app()->delete("/contacto/{id}", 'ContactosController@delete');

// ACTUALIZAR UN REGISTRO
app()->put("/contacto/{id}", 'ContactosController@update');
