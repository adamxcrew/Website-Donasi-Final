<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Annas Abdurrahman',
                'email'          => 'annasabdurrahman@admin.com',
                'password'       => bcrypt('admin1'),
                'remember_token' => null,
                'telepon'        => '',
                'alamat'         => '',
            ],
        ];

        User::insert($users);
    }
}
