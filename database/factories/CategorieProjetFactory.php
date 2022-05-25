<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID_PROJET' => $this->faker->optional($weight=100)->unique($reset=true)->numberBetween(1,60),
            'ID_CATEGORIE' => $this->faker->optional($weight=100)->unique($reset=true)->numberBetween(1,60),
        ];
    }
}
