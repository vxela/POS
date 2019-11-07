<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_employee extends Model
{
    protected $fillable = [
        'emp_code', 
        'emp_name', 
        'emp_id_number', 
        'emp_sex', 
        'emp_address', 
        'emp_phone_number', 
        'emp_religion', 
        'emp_date_in', 
        'account_status',
        'user_id', 
        'created_at',
        'updated_at'
    ];
}
