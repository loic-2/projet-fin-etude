<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NOM_ADMINISTRATEUR' => $this->faker->name,
            'EMAIL_ADMINISTRATEUR' => $this->faker->email(),
            'LOGIN_ADMINISTRATEUR' => $this->faker->word(),
            'MOT_DE_PASSE_ADMINISTRATEUR' => $this->faker->password(30,120),
            'TELEPHONE_ADMINISTRATEUR' => $this->faker->phoneNumber(),
            'CONNECTE' => $this->faker->boolean(),
            'DATE_CREATION_ADMINISTRATEUR' =>$this->faker->date()
        ];
    }
}
