<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\caisse>
 */
class CaisseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->text,
            'user_id' => User::factory(),
            'montant' => $this->faker->randomFloat(2, 0, 1000),
            'date'  => $this->faker->date(),
            'AcheterPar' => $this->faker->name,

        ];
    }
}
