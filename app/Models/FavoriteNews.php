<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FavoriteNews extends Model
{
    protected $fillable = ['name' , 'link'];

    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
