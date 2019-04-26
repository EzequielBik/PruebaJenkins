<?php

namespace App\Http\Controllers;

use App\Establishment;
use App\Purchase;
use App\Response;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $json = $request->json()->all();

        //Traer Purchase
            $purchase = Purchase::select();

        //Armo Respuesta
            $return = new Response(true, array("data" => $purchase));

        return $return;
    }

    public function store(Request $request)
    {
        $json = $request->json()->all();

        //Agregar Purchase
            $purchase = new Purchase();
            $purchase->user_id = $json["user_id"];
            $purchase->auction_id = $json["auction_id"];
            $purchase->amount = $json["amount"];
            $purchase->price = $json["price"];
            $purchase->bid_date = $json["bid_date"];
            $purchase->reason = $json["reason"];
            $purchase->user_calification = $json["user_calification"];
            $purchase->user_calification_comments = $json["user_calification_comments"];
            $purchase->weight = $json["weight"];
            $purchase->buyer_name = $json["buyer_name"];
            $purchase->offer_id = $json["offer_id"];
            $purchase->save();

        //Traer Id de Purchase Agregado
            $id = $purchase->getTheLastIdInserted();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $id));

        return $return;
    }

    public function update(Request $request)
    {
        $json = $request->json()->all();

        //Traer Id de Purchase Agregado
            $purchase = Purchase::findOrFail($json["id"]);

        //Agregar Purchase
            $purchase->user_id = $json["user_id"];
            $purchase->auction_id = $json["auction_id"];
            $purchase->amount = $json["amount"];
            $purchase->price = $json["price"];
            $purchase->bid_date = $json["bid_date"];
            $purchase->reason = $json["reason"];
            $purchase->user_calification = $json["user_calification"];
            $purchase->user_calification_comments = $json["user_calification_comments"];
            $purchase->weight = $json["weight"];
            $purchase->buyer_name = $json["buyer_name"];
            $purchase->offer_id = $json["offer_id"];
            $purchase->save();

        //Armo Respuesta
            $return = new Response(true, array("ID" => $json["id"]));

        return $return;
    }
}
