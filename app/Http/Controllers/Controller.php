<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function checkpermission($permission)
    {
        $user = Auth::user();
        $roles = $user->roles;
        $permissions = $roles[0]->permissions;
        $access = false;
        foreach ($permissions as $p) {
            if ($p->permission_key == $permission) {
                $access = true;
                break;
            }
        }
        if ($access == false) {
            return \Redirect::to('dashboard-panel')->send()->with('error_message', 'You Have No Permission For Access This Route');
        }
    }
}
