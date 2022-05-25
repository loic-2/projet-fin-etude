<?php

namespace Database\Seeders;

use App\Models\Encadrement;
use App\Models\Encadreur;
use App\Models\Membre;
use App\Models\Utilisateur;
use App\Models\Visite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Encadreur::factory(60)->create();
        Visite::factory(60)->create();
        Utilisateur::factory(60)->create();
        Membre::factory(60)->create();
        Encadrement::factory(60)->create();
    }
}
