<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['BMW', 'Mercedes', 'Tesla', 'Lada', 'Opel'];
        foreach ($array as $brand) {
                DB::table('brands')->insert([
                    'name' => $brand
                ]);

        }
    }

}
