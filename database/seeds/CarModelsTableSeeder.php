<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['BMW' => ['503', 'x5', 'z1'], 'Mercedes' => ['Gelandewagen', 'CLS', '600 Pullman'], 'Tesla' => ['model X', 'model S', 'model 3'], 'Lada' => ['Kalina', 'Raven', 'Vesta'], 'Opel' => ['Astra', 'Vectra', 'Vivaro']];
        foreach ($array as $key => $model_array)
        {
            foreach ($model_array as $model)
            {
                DB::table('car_models')->insert([
                    'name' => $model,
                    'brand_id'=> DB::table('brands')->whereBrand($key)->get()->pluck('id')[0]

                ]);
            }
        }
    }
}
