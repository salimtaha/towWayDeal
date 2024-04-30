<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charity>
 */
class CharityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->email(),
            'password'=>$this->faker->password(),
            'description'=>$this->faker->paragraph(1),
            'phone'=>$this->faker->phoneNumber,
            'image'=>'default.jpg',
            'governorate_id'=>1,
            'city_id'=>1,
            'status'=>$this->faker->randomElement(['approved' ,'pending']),
        ];
    }
}
