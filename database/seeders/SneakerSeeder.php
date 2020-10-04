<?php

namespace Database\Seeders;

use App\Models\Ranking;
use App\Models\Sneaker;
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
            ->hasRankings(10)
            ->create();
    }
}
