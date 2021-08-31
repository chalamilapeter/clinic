<?php

namespace Database\Seeders;

use App\Models\Admin\Lab;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratories = [
            ['name' => 'KCMC Labs', 'location' => 'Lunguo B', 'phone' => '0745454545', 'email' => 'info@kcmclabs.com', 'website' => 'https://www.kcmclabs.com'],
            ['name' => 'Goodhope', 'location' => 'Shanty', 'phone' => '0712121212', 'email' => 'hello@goodhope.com', 'website' => 'https://www.goodhope.com'],
            ['name' => 'Faraja', 'location' => 'Majengo', 'phone' => '0789898989', 'email' => 'info@farajalabs.com', 'website' => 'https://www.farajalabs.com'],
        ];
        foreach ($laboratories as $laboratory) {
            Lab::updateOrCreate(['name' => $laboratory['name']], $laboratory);
        }
    }
}
