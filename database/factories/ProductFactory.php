<?php
namespace Database\Factories;

use App\Models\GroupCity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->sentence(),
            'id_group_cities' => $this->faker->randomElement(GroupCity::pluck('id'))
        ];
    }
}
