<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Fprice {
    public static function Rupiah($price) {
        $rupiah = "Rp " . number_format($price,2,',','.');
        return $rupiah;
    }
}