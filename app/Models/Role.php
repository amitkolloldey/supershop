<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'created_at', 'updated_at'];


    function  modules(){
        return $this->belongsToMany('App\Models\Module', 'role_modules');
    }
    function  permissions(){
        return $this->belongsToMany('App\Models\Permission', 'role_permissions');
    }
}
