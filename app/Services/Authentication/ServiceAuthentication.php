<?php

namespace App\Services\Authentication;

use Exception;
use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class ServiceAuthentication
{
    public function __construct(AuthManager $auth,Hasher $hash, User $user)
    {
        $this->auth = $auth;
        $this->hash = $hash;
        $this->user = $user;
    }

    public function signIn($validatedUser)
    {
        try {
            if (!$this->auth->attempt($validatedUser)) {
                abort(401 , 'Unauthorized');
            }
            $user = $this->user->where('email', $validatedUser['email'])->first();
            if (!$this->hash->check($validatedUser['password'], $user->password, [])) {
                abort(401 , 'Unauthorized');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return[
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ];
        } catch (Exception $error) {
                abort(401 , 'Unauthorized');
        }
    }

    public function signOut()
    {
        
    }
}
