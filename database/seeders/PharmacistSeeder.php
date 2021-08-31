<?php

namespace Database\Seeders;

use App\Models\Admin\Pharmacist;
use Illuminate\Database\Seeder;

class PharmacistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pharmacists = [
            ['user_id' => 11, 'pharmacy_id' => 1, 'first_name' => 'Alexander', 'last_name' => 'Kipsya', 'birth_date' => '1976-11-14', 'gender' => 'Male', 'phone' =>' 0747455658'],
            ['user_id' => 12, 'pharmacy_id' => 2, 'first_name' => 'Kelvin', 'last_name' => 'McMillan', 'birth_date' => '1979-07-12', 'gender' => 'Male', 'phone' => '0612345678'],
            ['user_id' => 13, 'pharmacy_id' => 3, 'first_name' => 'Benjamin', 'last_name' => 'Doctor', 'birth_date' => '1988-09-14', 'gender' => 'Male', 'phone' => '0789675432'],
        ];

        foreach ($pharmacists as $pharmacist) {
            Pharmacist::updateOrCreate(['user_id' => $pharmacist['user_id']], $pharmacist);
        }
    }
}
