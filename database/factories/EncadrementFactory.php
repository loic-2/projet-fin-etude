<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EncadrementFactory extends Factory
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
            'ID_MEMBRE' => $this->faker->optional($weight=100)->unique(true)->numberBetween(1,60),
            'ID_ENCADREUR' => $this->faker->optional($weight=100)->unique(true)->numberBetween(1,60),
            'TYPE_ENCADREMENT' => $this->faker->word(),
            'ANNEE_ENCADREMENT' => $this->faker->date()
        ];
    }
}
