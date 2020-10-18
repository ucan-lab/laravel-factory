<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'account_status' => 'active',
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * @return Factory
     */
    public function preRegistered(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'account_status' => 'pre_registered',
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * @return Factory
     */
    public function active(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'account_status' => 'active',
                'email_verified_at' => now(),
            ];
        });
    }

    /**
     * @return Factory
     */
    public function suspended(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'account_status' => 'suspended',
            ];
        });
    }
}
