<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        //$user = Auth::user();
        /*
        //assign role
        $role = Role::where('slug', 'editor')->first();
        $user->roles()->attach($role); */
        //dd($user->hasRole('editor')); // true
        //dd($user->hasRole('author')); // false
        //dd($user->roles);

        // check permission
        // $permission = Permission::first();
        // $user->permissions()->attach($permission);
        // dd($user->permissions);

        //dd($user->hasPermission('add-post')); //true
        //dd($user->hasPermission('edit-post')); //false

        //dd($user->can('add-post'));
        //dd($user->can('delete-post'));
        return view('dashboard');
    }
}
