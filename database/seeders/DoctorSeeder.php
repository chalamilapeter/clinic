<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            ['user_id' => 2, 'speciality' => 'Chronic Clinic', 'first_name' => 'Andrea', 'last_name' => 'Ketaketa', 'birth_date' => '1986-07-19', 'gender' => 'Male', 'phone' =>' 0777931209'],
            ['user_id' => 3, 'speciality' => 'Chronic Clinic', 'first_name' => 'Peter', 'last_name' => 'Chalamila', 'birth_date' => '1974-09-06', 'gender' => 'Male', 'phone' => '0779755938'],
            ['user_id' => 4, 'speciality' => 'Chronic Clinic', 'first_name' => 'Peter', 'last_name' => 'Pierre', 'birth_date' => '1974-03-02', 'gender' => 'Male', 'phone' => '0777931071'],
        ];

        foreach ($doctors as $doctor) {
            Doctor::updateOrCreate(['user_id' => $doctor['user_id']], $doctor);
        }
    }
}
