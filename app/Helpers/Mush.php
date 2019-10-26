<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Mush {

    public static function getUniqStr() {

        return substr(
            base_convert(
                sha1(
                    uniqid(
                        mt_rand()
                    )
                ), 16, 36
            ), 0, str_replace(
                ".", "", 
                str_replace(
                    " ", "", 
                    microtime()
                )
            )
        );

        // usage :
        // Mush::getUniqStr()
    }

    
}