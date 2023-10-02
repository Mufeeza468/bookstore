<?php

namespace App\Services;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    //User Registration
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'user',
        ]);
        return $user;
    }


    //User Login
    public function login(array $data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $user = User::where('email', $email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return [-1];
        }
        $token = $user->createToken('token')->plainTextToken;
        return [$token, $user];
    }


    //Getting all Users
    public function getAll()
    {
        return User::all();
    }


    //Getting a single User
    public function show($id)
    {
        return User::find($id);
    }


    //User Updation
    public function update(array $data)
    {
        $user = auth()->user();
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }


    //User Deletion
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return -1;
        }
        return User::where('id', $id)->delete();
    }


    //User Subscription
    public function subscribe()
    {
        $user = auth()->user();
        if (!$user->subscription) {
            return DB::table('users')->where('id', $user->id)->update(['subscription' => true]);
        } else {
            return -1;
            ;
        }
    }


    //User Logout
    public function logout()
    {
        $currentAccessToken = auth()->user()->currentAccessToken();

        if ($currentAccessToken) {
            return $currentAccessToken->delete();
        }
    }
}