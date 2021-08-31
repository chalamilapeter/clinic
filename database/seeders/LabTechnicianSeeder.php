<?php

namespace Database\Seeders;

use App\Models\Admin\LabTechnician;
use Illuminate\Database\Seeder;

class LabTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicians = [
            ['user_id' => 8, 'lab_id' => 1, 'first_name' => 'Benson', 'last_name' => 'Benjamin', 'birth_date' => '1995-02-04', 'gender' => 'Male', 'phone' =>' 0765696865'],
            ['user_id' => 9, 'lab_id' => 2, 'first_name' => 'Omary', 'last_name' => 'Homera', 'birth_date' => '1996-07-12', 'gender' => 'Male', 'phone' => '0775123654'],
            ['user_id' => 10, 'lab_id' => 3, 'first_name' => 'Salehe', 'last_name' => 'Hassan', 'birth_date' => '1996-09-14', 'gender' => 'Male', 'phone' => '0715141617'],
        ];

        foreach ($technicians as $technician) {
            LabTechnician::updateOrCreate(['user_id' => $technician['user_id']], $technician);
        }
    }
}
