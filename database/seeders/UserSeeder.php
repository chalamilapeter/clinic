<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            //admin
            ['role_id' => 1, 'number' => 'ADM/1098/2021', 'email'=>'admin@clinic.com', 'password' => Hash::make('admin2021')],

            //doctors
            ['role_id' => 2, 'number' => 'MD/1098/2021', 'email'=>'peter@clinic.com', 'password' => Hash::make('doctor2021')],
            ['role_id' => 2, 'number' => 'MD/1123/2021', 'email'=>'nicky@clinic.com', 'password' => Hash::make('doctor2021')],
            ['role_id' => 2, 'number' => 'MD/1748/2021', 'email'=>'stany@clinic.com', 'password' => Hash::make('doctor2021')],

            //patients
            ['role_id' => 3, 'number' => 'PA/1098/2021', 'email'=>'tave@clinic.com', 'password' => Hash::make('patient2021')],
            ['role_id' => 3, 'number' => 'PA/1123/2021', 'email'=>'keta@clinic.com', 'password' => Hash::make('patient2021')],
            ['role_id' => 3, 'number' => 'PA/1748/2021', 'email'=>'benja@clinic.com', 'password' => Hash::make('patient2021')],

            //Lab Technicians
            ['role_id' => 4, 'number' => 'LT/1098/2021', 'email'=>'ben@clinic.com', 'password' => Hash::make('technician2021')],
            ['role_id' => 4, 'number' => 'LT/1123/2021', 'email'=>'ommy@clinic.com', 'password' => Hash::make('technician2021')],
            ['role_id' => 4, 'number' => 'LT/1748/2021', 'email'=>'pierre@clinic.com', 'password' => Hash::make('technician2021')],

            //Pharmacists
            ['role_id' => 5, 'number' => 'PM/1098/2021', 'email'=>'alex@clinic.com', 'password' => Hash::make('pharmacist2021')],
            ['role_id' => 5, 'number' => 'PM/1123/2021', 'email'=>'kevy@clinic.com', 'password' => Hash::make('pharmacist2021')],
            ['role_id' => 5, 'number' => 'PM/1748/2021', 'email'=>'salehe@clinic.com', 'password' => Hash::make('pharmacist2021')],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['number' => $user['number']], $user);
        }
    }
}
