<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tax;
class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxes=[
            [
                'name'           => 'IGST@0%',
                'rate'          => '0',
            ], [
                'name'           => 'GST@0%',
                'rate'          => '0',
            ], [
                'name'           => 'IGST@0.25%',
                'rate'          => '0.25',
            ], [
                'name'           => 'GST@0.25%',
                'rate'          => '0.25',
            ], [
                'name'           => 'IGST@3%',
                'rate'          => '3',
            ],[
                'name'           => 'GST@3%',
                'rate'          => '3',
            ],[
                'name'           => 'IGST@5%',
                'rate'          => '5',
            ],[
                'name'           => 'GST@5%',
                'rate'          => '5',
            ],[
                'name'           => 'IGST@12%',
                'rate'          => '12',
            ],[
                'name'           => 'GST@12%',
                'rate'          => '12',
            ],[
                'name'           => 'IGST@18%',
                'rate'          => '18',
            ],[
                'name'           => 'GST@18%',
                'rate'          => '18',
            ],[
                'name'           => 'IGST@28%',
                'rate'          => '28',
            ],[
                'name'           => 'GST@28%',
                'rate'          => '28',
            ],[
                'name'           => 'EXEMPTED',
                'rate'          => '0',
            ],
        ];
        tax::insert($taxes);

    }
}
