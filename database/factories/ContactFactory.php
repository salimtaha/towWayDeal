<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>'سالم',
            'email'=>'salim@gmail.com',
            'subject'=>'اكتشاف ثغره',
            'message'=>'الثغره هي .....',
            'status'=>'pending',
        ];
    }
}
