<?php

namespace App\Services\User;

use App\User;
use Exception;
use Illuminate\Contracts\Hashing\Hasher;

class ServiceUser
{
    public function __construct(User $user , Hasher $hash)
    {
        $this->user = $user;
        $this->hash = $hash;
    }

    public function register($user)
    {
        try{
            $this->user->create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'password'=>$this->hash->make($user['password'])
            ]);
        }catch(Exception $error){
            abort(422 , 'Duplicated');
        }
    }
}