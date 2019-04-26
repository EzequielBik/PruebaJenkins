<?php
/**
 * Created by PhpStorm.
 * User: ezequiel
 * Date: 25/04/2019
 * Time: 11:20 AM
 */

namespace App;


class Response
{
    public function __construct(bool $result, array $return)
    {
        if($result)
        {
            if(isset($data["ID"]))
            {
                return array("result" => $result, "message" => $return["ID"]);
            }
            else{
                return array("result" => $result, "message" => $return["data"]);
            }
        }
        else{
            return array("result" => $result, "error" => $return["error"]);
        }
    }

}