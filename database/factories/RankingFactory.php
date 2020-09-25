<?php

namespace Database\Factories;

use App\Models\Sneaker;
use App\Models\Ranking;
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
            'SneakerName' => Sneaker::factory(),
            'Platform' => $this->faker->company,
            'Date' => $this->faker->date(),
        ];
    }
}
