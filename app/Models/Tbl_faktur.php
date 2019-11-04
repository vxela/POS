<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_faktur extends Model
{
    //
    protected $fillable = [
        'nota_number',
        'customer_id',
        'id_pengiriman',
        'order_date',
        'order_price',
        'status_pembayaran',
        'sisa_pembayaran',
        'user_id'
    ];

    public function getCustomer() {
        return Tbl_customer::where('id', $this->customer_id)->first();
    }

    public function getUser(){
        return \App\User::where('id', $this->user_id)->first();
    }

}
