<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'bayu',
            'email' => 'smpn_4tilkam@yahoo.com',
            'password' => Hash::make('smpn4tilkamoperator'),
        ]);
    }
}
