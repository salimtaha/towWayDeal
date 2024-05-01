<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            MediatorSeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CharitySeeder::class,
            StoreSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            ContactSeeder::class,
            WithdrawalMethodSeeder::class,
            WithdrawalSettingSeeder::class,
        ]);
    }
}
