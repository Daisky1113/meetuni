<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'country' => 'Taiwan',
                'region_id' => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'country' => 'South Korea',
                'region_id' => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'country' => 'Mexico',
                'region_id' => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'country' => 'Argentina',
                'region_id' => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];
                DB::table('countries')->insert($data);
    }
}
