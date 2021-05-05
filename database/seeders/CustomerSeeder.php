<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=[
            [
             'name' => 'souvik gain',
            'email' => '4bit@gmail.com',
            'password' => Hash::make('souvik'),
            'is_active'=>true,
            ],
        ];
    }
}
