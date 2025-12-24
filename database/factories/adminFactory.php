<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
     protected $model = \App\Models\admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name'=>fake()->name(),
             'email'=>fake()->unique()->safeEmail(),
             'password'=>fake()->password(),
             'role'=>fake()->randomElement(['super_admin', 'admin']),
        ];
    }
}
