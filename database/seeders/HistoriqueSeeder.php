<?php

namespace Database\Seeders;

use App\Models\Historique;
use Illuminate\Database\Seeder;

class HistoriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Historique::factory(100)->create();
    }
}
