<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Mush {

    public static function getUniqStr() {

        $strUniq = md5(str_replace(".", "", str_replace(" ", "", microtime())).base_convert(sha1(uniqid(mt_rand())), 16, 36));

        return $strUniq;

    }
    
    public static function showNotif($status, $msg){
        echo "<div id='m_notif' data-flash_type='".$status."' data-flash_msg='".$msg."'>
        </div>";
    }
    
    
}

// usage :
// Mush::getUniqStr()