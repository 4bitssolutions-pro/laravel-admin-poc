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
            'email' => '4bit@gmail.com',
            'password' => Hash::make('souvik'),
            'is_active'=>true,
            ],
        ];
            User::insert($user);

    }
}
