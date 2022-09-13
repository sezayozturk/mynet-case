<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
    {

        public function definition()
            {
                return [
                    'name' => fake()->firstName(),
                    'surname' => fake()->lastName(),
                    'birthday' => fake()->date(),
                    'gender' => fake()->randomElement(['male', 'female']),
                ];
            }
    }
