<?php

namespace Database\Factories;

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
            'category_id'=>random_int(1,10),
            'store_id'=>random_int(1,4),
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph(1),
            'available_for'=>$this->faker->date('Y-m-d' , 2025-02-22),
            'expire_date'=>$this->faker->date('Y-m-d' , 2026-02-22),
            'price'=>$this->faker->randomFloat(2 , 50 , 1000),
            'descount'=>$this->faker->randomFloat(2 , 50 , 1000),
            'quantity'=>random_int(10,300),
        ];
    }
}
