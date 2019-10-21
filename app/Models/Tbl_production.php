<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_production extends Model
{

    protected $fillable = ['product_id', 'product_quantity', 'activity_date', 'user_id', 'created_at', 'updated_at'];

    public function getProduk() {
        return Tbl_product::where('id', $this->product_id)->first();
    }

    public function getUser() {
        return \App\User::where('id', $this->user_id)->first();
    }

}
