<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = [
            ['user_id' => 5, 'disease_id' => 3, 'doctor_id' => 1, 'appointment_date' => '2020-09-07', 'first_name' => 'Benjamin', 'last_name' => 'Doctor', 'birth_date' => '1937-03-07', 'address' => 'Majengo', 'gender' => 'Male', 'phone' => '0779646964'],
            ['user_id' => 6, 'disease_id' => 1, 'doctor_id' => 2, 'appointment_date' => '2020-02-23', 'first_name' => 'Raphael', 'last_name' => 'Peter', 'birth_date' => '1956-09-23', 'address' => 'Shanty', 'gender' => 'Male', 'phone' =>' 0776497109'],
            ['user_id' => 7, 'disease_id' => 2, 'doctor_id' => 3, 'appointment_date' => '2020-08-09', 'first_name' => 'Stanley', 'last_name' => 'Kiwia', 'birth_date' => '1960-07-27', 'address' => 'LUNGUO B', 'gender' => 'Male', 'phone' => '0777931209'],
        ];

        foreach ($patients as $patient) {
            Patient::updateOrCreate(['user_id' => $patient['user_id']], $patient);
        }
    }
}
