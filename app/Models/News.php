<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id' , 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
