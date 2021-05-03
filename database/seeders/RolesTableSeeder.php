<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Super_Admin',
            ],
            [
                'id'    => 2,
                'title' => 'SubAdmin',
            ],    [
                'id'    => 3,
                'title' => 'StoreManager',
            ],
        ];

        Role::insert($roles);
    }
}
