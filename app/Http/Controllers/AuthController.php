<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Authentication\ServiceAuthentication;
use Exception;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct(ServiceAuthentication $service)
    {   
        $this->service = $service;
    }

    public function testLoginService(LoginRequest $request)
    {
        return $this->service->login($request->validated());
    }
    
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'No valido'
                ]);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'email'=>$user->email,
                'name'=>$user->name
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 401,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }
}
