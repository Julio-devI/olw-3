<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "address" => $this->faker->streetAddress(),
            "city" => $this->faker->city(),
            "state" => $this->faker->stateAbbr(),
            "zipcode" => $this->faker->numberBetween(13400, 2000),
            "district" => $this->faker->word(),
            "number" => $this->faker->numberBetween(1, 10000),
            "complement" => $this->faker->word(),
        ];
    }
}
