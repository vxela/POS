<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_production extends Model
{

    public function getProduk() {
        return Tbl_product::where('id', $this->product_id)->first();
    }

    public function getUser() {
        return \App\User::where('id', $this->user_id)->first();
    }

}
