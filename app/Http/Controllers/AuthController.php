<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Authentication\ServiceAuthentication;

class AuthController extends Controller
{

    public function __construct(ServiceAuthentication $service)
    {   
        $this->service = $service;
    }

    public function signIn(LoginRequest $request)
    {
        $response = $this->service->signIn($request->validated());
        return response($response, 200);
    }

    public function signOut()
    {
        $response = $this->service->signOut();
        return response($response, 200);
    }
    
}
