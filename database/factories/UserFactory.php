<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // name
            'email' => $this->faker->unique()->safeEmail(), // email
            'email_verified_at' => now(), // email verified at
            'password' => Hash::make('password'), // password
            'rule' => 'user', // user role by default
            'remember_token' => Str::random(10), // remember token
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model should have specific test user data.
     */
    public function testUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'TestUser',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Test1234'),
            'rule' => 'user',
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the model should have specific employee user data.
     */
    public function adminUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'AdminUser',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1234'),
            'rule' => 'admin',
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the model should have specific dentist user data.
     */
    public function dentistUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'DentistUser',
            'email' => 'dentist@gmail.com',
            'password' => Hash::make('Dentist1234'),
            'rule' => 'dentist',
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the model should have specific employee user data.
     */
    public function employeeUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'EmployeeUser',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('Employee1234'),
            'rule' => 'employee',
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the model should have specific patient user data.
     */
    public function patientUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'PatientUser',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('Patient1234'),
            'rule' => 'patient',
            'email_verified_at' => now(),
        ]);
    }
}
