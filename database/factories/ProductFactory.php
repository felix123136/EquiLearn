<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_ids = Category::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->randomElement($category_ids),
            'picture' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(1000, 10000000),
            'description' => $this->faker->paragraph(3),
            'stock' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
