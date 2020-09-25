<?php

namespace Database\Seeders;

use App\Models\Sneaker;
use App\Models\Ranking;
use Illuminate\Database\Seeder;

class SneakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sneaker::factory()
            ->times(50)
            ->hasRankings(100)
            ->create();
    }
}
