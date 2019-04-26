<?php
/**
 * Created by PhpStorm.
 * User: ezequiel
 * Date: 25/04/2019
 * Time: 10:40 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'auctions_offers';
    protected $fillable = ['auction_id','user_id','amount','price'];

    public function getTheLastIdInserted(){
        $idLast = Offer::all()->last();
        return $idLast['id'];
    }
}