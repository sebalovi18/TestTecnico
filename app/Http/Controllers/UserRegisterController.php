<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Services\User\ServiceUser;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function __construct(ServiceUser $service)
    {
        $this->service = $service;
    }

    public function register(UserRegisterRequest $request)
    {
        $response = $this->service->register($request->validated());
        return response($response , 201);
    }
}
