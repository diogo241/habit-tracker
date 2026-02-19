<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $habits = [
            'Ler 10 páginas',
            'Fazer 10 exercícios',
            'Beber 4 litros de água',
            'Brincar com meninos'
        ];

        return [
            'user_id' => 1,
            'name' => $this->faker->unique->randomElement($habits),
        ];
    }
}
