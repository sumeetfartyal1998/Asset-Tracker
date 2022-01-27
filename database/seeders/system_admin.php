<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class system_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Sumeet Fartyal',
            'email'=>'sammyfartyal1106@gmail.com',
            'password'=>Hash::make('Sumeet@123')
        ]);
    }
}
