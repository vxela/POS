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
}
