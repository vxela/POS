<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_temp_po extends Model
{
    protected $fillable = ['nota_id', 'barang_id', 'jml_barang', 'order_price', 'customer_id', 'user_id', 'created_at', 'updated_at'];
}
