<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * List all roles
     * 
     * @return string
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();

        return response()->json($roles);
    }
}
