<?php

namespace App\middleware;

class JsonValidator{

    public static function validate($data){
        json_decode($data);
        return json_last_error() == JSON_ERROR_NONE;
    }

}