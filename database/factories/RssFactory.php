<?php

namespace Database\Factories;

use App\Models\Rss;
use Illuminate\Database\Eloquent\Factories\Factory;

class RssFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rss::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(-100, 100)
        ];
    }
}
