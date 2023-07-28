<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserRole;

class UserController extends Controller
{
    /**
     * List all users
     * 
     * @return string
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->with('userRoles.role')->get();

        return response()->json($users);
    }

    /**
     * Store user
     * 
     * @return string
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'roles' => ['required', 'array', 'exists:roles,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        foreach ($request->roles as $value) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $value,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => __('messages.user_create_success'),
        ]);
    }
}
