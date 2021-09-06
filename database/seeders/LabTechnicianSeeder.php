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
            ['user_id' => 8, 'lab_id' => 1, 'first_name' => 'Shukuru', 'last_name' => 'Tave', 'birth_date' => '1995-02-04', 'gender' => 'Male', 'phone' =>' 0776496327'],
            ['user_id' => 9, 'lab_id' => 2, 'first_name' => 'Omary', 'last_name' => 'Homera', 'birth_date' => '1996-07-12', 'gender' => 'Male', 'phone' => '0775123654'],
            ['user_id' => 10, 'lab_id' => 3, 'first_name' => 'Benson', 'last_name' => 'Benjamin', 'birth_date' => '1996-09-14', 'gender' => 'Male', 'phone' => '0776639156'],
        ];

        foreach ($technicians as $technician) {
            LabTechnician::updateOrCreate(['user_id' => $technician['user_id']], $technician);
        }
    }
}
