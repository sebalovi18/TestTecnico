<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function storeUser($user)
    {
        User::create($user);
    }
}
