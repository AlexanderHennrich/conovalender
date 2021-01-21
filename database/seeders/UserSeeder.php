<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

                    'name' => 'Alex',
                    'email' => 'alhennri'.'@gmail.com',
                    'password' => Hash::make('test12345'),
                    'active' => 1,
                    'admin'=>1,

               ]);
        DB::table('users')->insert([

            'name' => 'Jana',
            'email' => 'Jana'.'@gmail.com',
            'password' => Hash::make('test12345'),
            'active' => 1,
            'admin'=>0,

        ]);
    }
}
