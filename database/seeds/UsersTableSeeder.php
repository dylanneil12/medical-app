<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$DQ52BOCMkdIvPC1yF8.hKeea.Ns7Nw/sHSJ.TwiDKa.uytO8tPxHm',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
