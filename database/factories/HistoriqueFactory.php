<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID_ADMINISTRATEUR' => $this->faker->optional($weight=100)->numberBetween(2,100),
            'ACTION_HISTORIQUE'=> $this->faker->sentence(8),
            'DATE_HISTORIQUE' => $this->faker->date()
        ];
    }
}
