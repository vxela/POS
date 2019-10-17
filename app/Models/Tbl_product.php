<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_product extends Model
{
    //
    protected $fillable = ['product_code', 'product_name', 'category_product_id', 'product_price', 'product_owner', 'product_desc', 'user_id', 'created_at', 'updated_at'];
    
    public function category() {
        return Tbl_product_categorie::where('id', $this->category_product_id)->first();
    }

    public function getUser() {
        return \App\User::where('id', $this->user_id)->first();
    }
}
