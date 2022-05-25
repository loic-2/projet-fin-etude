<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MembreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID_PROJET' => $this->faker->optional($weight=100)->unique(true)->numberBetween(1,60),
            'NOM_MEMBRE' => $this->faker->name(),
            'FILIERE_MEMBRE' => $this->faker->word(),
            'TELEPHONE_MEMBRE' => $this->faker->phoneNumber(),
        ];
    }
}
