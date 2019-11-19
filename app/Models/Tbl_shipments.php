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

    public function getOrder() {
        return Tbl_faktur::find($this->nota_id);
    }

    public function getCustomer() {
        return Tbl_customer::find($this->customer_id);
    }

    public function getTool() {
        return Tbl_shipment_tool::find($this->tool_id);
    }
}
