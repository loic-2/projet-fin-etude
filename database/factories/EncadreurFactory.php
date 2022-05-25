<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EncadreurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NOM_ENCADREUR' => $this->faker->name,
            'PROFESSION_ENCADREUR' => $this->faker->word(),
            'TELEPHONE_ENCADREUR' => $this->faker->phoneNumber(),
        ];
    }
}
