<?php

namespace App\Http\Controllers;

use App\Establishment;
use App\Purchase;
use App\Response;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $json = $request->json()->all();

        //Traer Offer
            $offer = Purchase::select();

        //Armo Respuesta
            $return = new Response(true, array("data" => $offer));

        return $return;
    }

    public function store(Request $request)
    {
        $json = $request->json()->all();

        //Agregar Offer
            $offer = new Offer();
            $offer->user_id = $json["user_id"];
            $offer->auction_id = $json["auction_id"];
            $offer->amount = $json["amount"];
            $offer->price = $json["price"];
            $offer->save();

        //Traer Id de Offer Agregado
            $id = $offer->getTheLastIdInserted();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $id));

        return $return;
    }

    public function update(Request $request)
    {
        $json = $request->json()->all();

        //Traer Id de Offer Agregado
            $offer = Offer::findOrFail($json["id"]);

        //Agregar Offer
            $offer->user_id = $json["user_id"];
            $offer->auction_id = $json["auction_id"];
            $offer->amount = $json["amount"];
            $offer->price = $json["price"];
            $offer->save();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $json["id"]));

        return $return;
    }
}
