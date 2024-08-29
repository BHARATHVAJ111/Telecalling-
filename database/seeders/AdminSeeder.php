<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'contact' => '9629414890',
                'status' => 1,
                'password' => bcrypt('12345678'),
            ],
            // [
            //     'name' => 'store',
            //     'email' => 'store@gmail.com',
            //     'contact' => '9629414891',
            //     'designation' => '',
            //     'remarks' => '',
            //     'status' => 1,
            //     'role_id' => 2,
            //     'password' => bcrypt('12345678'),
            // ],
            // [
            //     'name' => 'sales',
            //     'email' => 'sales@gmail.com',
            //     'contact' => '9629414892',
            //     'designation' => '',
            //     'remarks' => '',
            //     'status' => 1,
            //     'role_id' => 3,
            //     'password' => bcrypt('12345678'),
            // ],
            // [
            //     'name' => 'service',
            //     'email' => 'service@gmail.com',
            //     'contact' => '9629414893',
            //     'designation' => '',
            //     'remarks' => '',
            //     'status' => 1,
            //     'role_id' => 4,
            //     'password' => bcrypt('12345678'),
            // ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

    }
}

