<?php

namespace App\Controllers;

use App\Models\Contacto;

class ContactosController extends Controller
{
    // Método para acceder a todos los registros de la tbl_contactos
    public function index()
    {
        $datosContactos = Contacto::all();
        response()->json($datosContactos);
    }

    // Método para acceder a un registro de la tbl_contactos
    public function edit($id)
    {
        $datosContacto = Contacto::find($id);
        response()->json($datosContacto);
    }

    // Método para crear un registro en la tbl_contactos
    public function store()
    {
        $contacto = new Contacto;

        $contacto->nombre = app()->request()->get('nombre');
        $contacto->primerapellido = app()->request()->get('primerapellido');
        $contacto->segundoapellido = app()->request()->get('segundoapellido');
        $contacto->correo = app()->request()->get('correo');
        $contacto->save();
        response()->json(["message" => "Registro agregado!"]);
    }

    // Método para eliminar un registro en la tbl_contactos
    public function delete($id)
    {
        Contacto::destroy($id);
        response()->json(["message" => "Registro " .$id. " eliminado!"]);
    }

    // Método para actualizar un registro de la tbl_contactos
    public function update($id)
    {
        // Recepcionando los datos del cliente
        $nombre=app()->request()->get('nombre');
        $primerapellido=app()->request()->get('primerapellido');
        $segundoapellido=app()->request()->get('segundoapellido');
        $correo=app()->request()->get('correo');

        // Buscando el registro por su id
        $contacto=Contacto::findOrFail($id);

        // Validando los datos
        $contacto->nombre=($nombre!="") ? $nombre : $contacto->nombre;
        $contacto->primerapellido=($primerapellido!="") ? $primerapellido : $contacto->primerapellido;
        $contacto->segundoapellido=($segundoapellido!="") ? $segundoapellido : $contacto->segundoapellido;
        $contacto->correo=($correo!="") ? $correo : $contacto->correo;

        // Actualizando los datos
        $contacto->update();

        response()->json(["message" => "Registro " .$id. " actualizado!"]);
    }
}
