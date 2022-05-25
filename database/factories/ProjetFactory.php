<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'TYPE_PROJET' => $this->faker->name(),
            'PROMOTION_PROJET' => $this->faker->date(),
            'LIEN_FICHIER_PROJET' => $this->faker->image(null, 640, 480),
            'NOM_PROJET' => $this->faker->sentence(),
            'VUE_PROJET' => $this->faker->randomDigit(),
            'TELECHARGEMENT_PROJET' => $this->faker->randomDigit(),
            'GROUPE_PROJET' => $this->faker->optional($weight=100)->randomDigitNotZero(),
        ];
    }
}
