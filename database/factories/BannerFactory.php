<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->title(),
            'user_id' => User::factory(),
            'target_url' => $this->faker->url(),
            'img_url' => $this->faker->imageUrl(),
            'cpm' => $this->faker->randomFloat(2, 0.01, 10),
            'views_limit' => $this->faker->randomNumber(),
        ];
    }
}
