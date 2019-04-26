<?php
/**
 * Created by PhpStorm.
 * User: ezequiel
 * Date: 25/04/2019
 * Time: 10:44 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'bids';
    protected $fillable = ['user_id', 'auction_id','amount','price','bid_date','reason','user_calification','user_calification_comments','weight','buyer_name','offer_id'];

    public function getTheLastIdInserted(){
        $idLast = Purchase::all()->last();
        return $idLast['id'];
    }
}