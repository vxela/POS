<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_product extends Model
{
    //

    public function category() {
        return Tbl_product_categorie::where('id', $this->category_product_id)->first();
    }

    public function getUser() {
        return \App\User::where('id', $this->user_id)->first();
    }
}
