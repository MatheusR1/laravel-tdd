<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discont>
 */
class DiscontFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'percenty' => $this->faker->randomFloat(1, 0),
            'campaign_id' => $this->faker->randomElement(Campaign::pluck('id'))
        ];
    }
}
