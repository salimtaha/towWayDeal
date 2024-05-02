<?php

namespace Database\Factories;

use App\Models\Mediator;
use App\Models\Store;
use App\Models\WithdrawalMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Withdrawal>
 */
class WithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mediator_id'=>Mediator::inRandomOrder()->first()->id,
            'store_id'=>Store::inRandomOrder()->first()->id,
            'withdrawal_method'=>WithdrawalMethod::inRandomOrder()->first()->id,
            'number'=>01032332323,
            'amount'=>random_int(500 , 15000),
            'created_at'=>now(),
            'updated_at'=>now(),
            'status'=>$this->faker->randomElement(['pending' , 'accepted', 'rejected']),
        ];
    }
}
