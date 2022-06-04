<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Check>
 */
class CheckFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {

        return [
            'title' => $this->faker->text(10),
            'resource' => $this->faker->url(),
            'user_id' => rand(1, 3),
        ];

    }

}
