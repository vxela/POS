<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_shipments extends Model
{
    protected $fillable = [
        'nota_id',
        'customer_id',
        'tool_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
