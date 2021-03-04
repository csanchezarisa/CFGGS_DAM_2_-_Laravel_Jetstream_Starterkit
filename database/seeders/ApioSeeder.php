<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apio;

class ApioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apio::factory()->times(5)->create();
    }
}
