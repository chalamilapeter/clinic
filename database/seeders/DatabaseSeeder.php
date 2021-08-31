<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            DiseaseSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            LaboratorySeeder::class,
            LabTechnicianSeeder::class,
            PharmacySeeder::class,
            PharmacistSeeder::class,
        ]);
    }
}
