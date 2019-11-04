<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_po extends Model
{
    //
    protected $fillable = [
        'nota_id',
        'barang_id',
        'jml_barang',
        'diskon_satuan',
        'order_price',
        'customer_id',
        'user_id'
    ];

    public function getProduk(){
        return Tbl_product::where('id', $this->barang_id)->first();
    }

    public function getUser(){
        return \App\User::where('id', $this->user_id)->first();
    }
}
