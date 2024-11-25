<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rule;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rule>
 */
class RuleFactory extends Factory
{
    protected $model = Rule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => 'admin',
            'is_active' => true,
            'comment' => 'Admin rule',
        ];
    }

    /**
     * Indicate that the model's state should be "dentist".
     */
    public function dentist(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'dentist',
            'comment' => 'Dentist rule',
        ]);
    }
}
