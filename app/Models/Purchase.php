<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['goods_name', 'party_name', 'totalamount', 'paidamount', 'dueamount', 'status', 'created_by', 'modified_by', 'purchase_date', 'created_at', 'updated_at'];
}
