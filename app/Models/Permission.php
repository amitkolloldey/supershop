<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'permission_key', 'created_at','updated_at'];

    function  roles(){
        return $this->belongsToMany('App\Models\Role', 'role_permisisons');
    }
}
