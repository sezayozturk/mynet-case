<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
    {
        public function definition()
            {
                $countryId = 212;
                $cityId = fake()->randomElement(City::where('country_id',$countryId)->get()->pluck('id'));
                return [
                    'type' => fake()->randomElement(['home', 'business','other']),
                    'address' => fake()->address(),
                    'post_code' => fake()->postcode(),
                    'country_id' => $countryId ?? null,
                    'city_id' => $cityId ?? null,
                ];
            }
    }
