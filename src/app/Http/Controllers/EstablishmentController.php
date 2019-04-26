<?php

namespace App\Http\Controllers;

use App\Establishment;
use App\Response;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index(Request $request)
    {
        $json = $request->json()->all();

        //Traer Establecimientos
            $establishments = Establecimientos::select()->orderby('nombre', 'asc');

        //Armo Respuesta
            $return = new Response(true, array("data" => $establishments));

        return $return;
    }

    public function store(Request $request)
    {
        $json = $request->json()->all();

        //Agregar Establecimiento
            $establishment = new Establishment();
            $establishment->nombre = $json["name"];
            $establishment->numero_senasa = $json["numero_senasa"];
            $establishment->calle = $json["calle"];
            $establishment->altura = $json["altura"];
            $establishment->ciudad = $json["ciudad"];
            $establishment->pais = $json["pais"];
            $establishment->save();

        //Traer Id de Establecimiento Agregado
            $id = $establishment->getTheLastIdInserted();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $id));

        return $return;
    }

    public function update(Request $request)
    {
        $json = $request->json()->all();

        //Traer Id de Establecimiento Agregado
            $establishment = Establishment::findOrFail($json["id"]);

        //Agregar Establecimiento
            $establishment->nombre = $json["name"];
            $establishment->numero_senasa = $json["numero_senasa"];
            $establishment->calle = $json["calle"];
            $establishment->altura = $json["altura"];
            $establishment->ciudad = $json["ciudad"];
            $establishment->pais = $json["pais"];
            $establishment->save();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $json["id"]));

        return $return;
    }
}
