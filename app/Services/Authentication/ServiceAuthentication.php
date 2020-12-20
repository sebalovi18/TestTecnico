<?php

namespace App\Services\Authentication;

use Exception;
use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class ServiceAuthentication
{
    public function __construct(AuthManager $auth, Hasher $hash, User $user)
    {
        $this->auth = $auth;
        $this->hash = $hash;
        $this->user = $user;
    }

    public function login($validatedUser)
    {
        try {
            if (!$this->auth->attempt($validatedUser)) {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'No valido'
                ]);
            }
            $user = $this->user->where('email', $validatedUser->email)->first();
            if (!$this->hash->check($validatedUser->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
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
