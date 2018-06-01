<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['expenses_name', 'party_name', 'totalamount', 'paidamount', 'dueamount', 'product_name', 'created_by', 'modified_by', 'created_at', 'updated_at'];
}
