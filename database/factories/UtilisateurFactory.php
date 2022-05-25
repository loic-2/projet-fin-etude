<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NOM_UTILISATEUR' => $this->faker->name(),
            'LOGIN_UTILISATEUR' => $this->faker->word(),
            'EMAIL_UTILISATEUR' => $this->faker->email(),
            'MOT_DE_PASSE_UTILISATEUR' => $this->faker->password(),
            'MATRICULE_UTILISATEUR' => $this->faker->unique(true)->macAddress(),
            'DATE_CREATION_UTILISATEUR' => $this->faker->date(),
        ];
    }
}
