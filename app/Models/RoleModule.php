<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModule extends Model
{
    protected $fillable = ['role_id', 'module_id', 'created_at', 'updated_at'];
}
