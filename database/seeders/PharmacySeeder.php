<?php

namespace Database\Seeders;

use App\Models\Admin\Pharmacy;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratories = [
            ['name' => 'KCMC Medics', 'location' => 'Lunguo B', 'phone' => '0711111111', 'email' => 'info@kcmcmedics.com', 'website' => 'https://www.kcmcmedics.com'],
            ['name' => 'Furaha Pharmacy', 'location' => 'Shanty', 'phone' => '0736323565', 'email' => 'hello@furahapharmacy.com', 'website' => 'https://www.furahapharmacy.com'],
            ['name' => 'Tozo Pharmaceuticals', 'location' => 'Majengo', 'phone' => '0652412365', 'email' => 'info@tuzopharmaceuticals.com', 'website' => 'https://www.tuzopharmaceuticals.com'],
        ];
        foreach ($laboratories as $laboratory) {
            Pharmacy::updateOrCreate(['name' => $laboratory['name']], $laboratory);
        }
    }
}
