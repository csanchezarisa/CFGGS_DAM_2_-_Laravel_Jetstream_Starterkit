<?php

namespace Database\Factories;

use App\Models\Apio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'tipus' => $this->faker->title,
            'caducitat' => $this->faker->dateTime('now', null),
        ];
    }
}
