<?php

namespace Database\Seeders;

use App\Models\CategorieProjet;
use Illuminate\Database\Seeder;

class CategorieProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieProjet::factory(60)->create();
    }
}
