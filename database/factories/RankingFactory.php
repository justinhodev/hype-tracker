<?php

namespace Database\Factories;

use App\Models\Ranking;
use App\Models\Sneaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RankingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ranking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sneaker_id' => Sneaker::factory(),
            'platform' => $this->faker->company,
            'date' => $this->faker->date(),
            'mentions' => $this->faker->randomNumber(),
        ];
    }
}
