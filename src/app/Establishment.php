<?php
/**
 * Created by PhpStorm.
 * User: ezequiel
 * Date: 25/04/2019
 * Time: 10:41 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $table = 'establishment';

    protected $fillable = ['nombre', 'numero_senasa', 'calle','altura','ciudad', 'pais'];

    public function getTheLastIdInserted(){
        $idLast = Establishment::all()->last();
        return $idLast['id'];
    }
}