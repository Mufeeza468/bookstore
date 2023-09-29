<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    //User Registration
    public function registerUsers(RegisterUserRequest $request, UserService $userService)
    {
        $validate = $request->validated();
        $response = $userService->register($validate);
        if (!$response) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 401);
        }

        return response()->json([
            'message' => 'Registeration Successful',
            'data' => $response,
        ], 200);
    }


    //User Login
    public function loginUsers(LoginUserRequest $request, UserService $userService)
    {
        $validate = $request->validated();
        $response = $userService->login($validate);
        if ($response[0] == -1) {
            return response()->json([
                'message' => 'Please Enter Valid Credentials',
            ], 402);
        }
        $user = [
            'id' => $response[1]->id,
            'name' => $response[1]->name,
            'email' => $response[1]->email,
        ];
        return response()->json([
            'message' => 'Login Successful',
            'token' => $response[0],
            'user' => $user,
        ], 200);
    }


    //User Logout
    public function logoutUser(UserService $userService)
    {
        $response = $userService->logout();
        if (!$response) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 401);
        }
        return response()->json(['message' => 'Logout Successfull'], 200);
    }


    //Getting all Users
    public function getUsers(UserService $userService)
    {
        $response = $userService->getAll();
        return response()->json([
            'message' => 'All users Data',
            'data' => $response,
        ], 200);
    }


    //Getting a single User
    public function showUsers($id, UserService $userService)
    {
        $user = $userService->show($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ]);
        }
        return response()->json([
            'message' => 'Found',
            'data' => $user,
        ], 200);
    }


    //User Updation
    public function updateUsers(UpdateUserRequest $request, UserService $userService)
    {
        $validate = $request->validated();
        $response = $userService->update($validate);
        return response()->json([
            'message' => "User Updated"
        ]);

    }


    //User Deletion
    public function deleteUsers($id, UserService $userService)
    {
        $response = $userService->delete($id);
        if ($response == -1) {
            return response()->json([
                'message' => 'User not found',
            ]);
        }
        return response()->json([
            'message' => 'User Successfully Deleted',
        ], 200);
    }


    //User Subscription
    public function subscribeUsers(UserService $userService)
    {
        $response = $userService->subscribe();
        if ($response == -1) {
            return response()->json([
                'message' => 'User is already subscribed ',
            ]);
        }
        return response()->json(['message' => 'Subscribed successfully']);
    }

}