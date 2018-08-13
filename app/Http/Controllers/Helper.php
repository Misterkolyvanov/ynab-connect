<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    public static function convert_money($num, $type='$'){
        if(is_numeric($num)){
            return $type.number_format($num / 1000, 2);
        }
        return 0;
    }
}
