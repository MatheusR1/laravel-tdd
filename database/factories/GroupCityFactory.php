<?php
namespace Database\Factories;

use App\Models\Campaign;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupCity>
 */
class GroupCityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'city_id' => $this->faker->randomElement(City::pluck('id')),
            'campaign_id' => $this->faker->randomElement(Campaign::pluck('id'))
        ];
    }
}
