<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'view_sidebar', 'module_key', 'module_url', 'module_rank', 'module_icon', 'created_at', 'updated_at'];

    function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_modules');
    }
}
