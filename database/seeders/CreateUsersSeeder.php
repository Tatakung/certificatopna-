<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user =  [
            [
                'name' => 'Admin',
                'lname' => 'Admin',
                'prefix' => 'null',
                'position' => 'null',
                'level' => 'null',
                'department' => 'null',
                'numberid' => 1111,
                'is_admin' => '1',
                'password' => bcrypt('123456789')
            ],
            [
                'name' => 'user',
                'lname' => 'user',
                'prefix' => 'Mr',
                'position' => 'null',
                'level' => 'null',
                'department' => 'null',
                'numberid' => 2222,
                'is_admin' => '0',
                'password' => bcrypt('123456789')
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
