<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Sneaker;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory()
            ->times(20)
            ->hasSneakers(20)
            ->create();
    }
}
