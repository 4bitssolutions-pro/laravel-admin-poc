<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
             'name' => 'souvik gain',
            'email' => 'souvikgain@gmail.com',
            'password' => Hash::make('souvik@1995'),
            ], [
             'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            ],
            [
                'name' => 'user',
               'email' => 'user@example.com',
               'password' => Hash::make('password'),
               ],
        ];
            User::insert($user);

    }
}
