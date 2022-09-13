<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
    {
        public function run()
            {
                Person::factory()
                      ->has(
                          Address::factory()->count(2)
                      )
                      ->count(10)
                      ->create();
            }
    }
