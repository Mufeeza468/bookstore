<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $role = 'user';

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }
        return response()->json([
            'message' => 'Registeration Successfull',
            'user' => $user,
        ], 200);
    }

    /**
     * Login User
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $email = $request['email'];
        $password = $request['password'];

        // Authenticate
        $user = User::where('email', $email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Please Enter Valid Credentials'], 401);
        }
        // $permissionsName = $user->permissions->pluck('name');

        $customUserData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            // 'permissions' => $permissionsName,
        ];

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Login Successfull',
            'token' => $token,
            'user' => $customUserData,
        ], 200);
    }

    /**
     * Logout the user
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logout Successfull'], 200);
    }

    public function getUsers()
    {
        return User::all();
    }

    public function showUsers($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User Not Found']);
        }
        $user->delete();

        return response()->json(['message' => 'User Deleted Successfully']);
    }
}