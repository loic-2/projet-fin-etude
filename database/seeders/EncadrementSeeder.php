<?php

namespace Database\Seeders;

use App\Models\Encadrement;
use Illuminate\Database\Seeder;

class EncadrementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Encadrement::factory(60)->create();
    }
}
