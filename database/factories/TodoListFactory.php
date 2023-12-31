<?php

namespace Database\Factories;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TodoList>
 */
class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()
                ->select('id')
                ->pluck('id')
                ->shuffle()
                ->first(),
            'is_done' => rand(0, 1),
            'name' => fake()->name()
        ];
    }
}
