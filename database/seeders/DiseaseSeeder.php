<?php

namespace Database\Seeders;

use App\Models\Admin\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diseases = [
            ['common_name' => 'Diabetes', 'scientific_name' => 'Diabetes Mellitus', 'months_interval' => '1'],
            ['common_name' => 'Cancer', 'scientific_name' => 'Cancer', 'months_interval' => '1'],
            ['common_name' => 'Chronic kidney disease (CKD)', 'scientific_name' => 'CKD', 'months_interval' => '1'],
            ['common_name' => 'Arthritis', 'scientific_name' => 'Arthritis', 'months_interval' => '1'],
            ['common_name' => 'High Blood Pressure', 'scientific_name' => 'Hypertension ', 'months_interval' => '1'],
        ];

        foreach ($diseases as $disease) {
            Disease::updateOrCreate(['common_name' => $disease['common_name']], $disease);
        }
    }
}
