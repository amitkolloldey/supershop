<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['totalamount', 'depositeamount', 'remainingamount', 'deposite_by', 'deposite_date', 'bank_name', 'created_by', 'modified_by', 'created_at', 'updated_at'];
}
