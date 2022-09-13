<?php

namespace Database\Seeders;

use App\Models\Common\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
    {
        public function run()
            {
                $this->call([
                    CountrySeeder::class,
                    CitySeeder::class,
                    PersonSeeder::class,
                ]);
            }
    }
