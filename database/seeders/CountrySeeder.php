<?php

namespace Database\Seeders;


use App\Models\Customer\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json/country.json');
        $data = json_decode($json);
        foreach ($data as $country) {
            Country::create([
                'country_name' => $country->country_name,
                'code' => $country->code,
            ]);
        }
    }
}
