<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('12341234')
        ]);
        DB::table('users')->insert([
            'name' => 'seba',
            'email' => 'sebalovi12@gmail.com',
            'password' => Hash::make('12341234')
        ]);
    }
}
