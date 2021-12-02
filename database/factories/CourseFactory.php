<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fileName = $this->faker->numberBetween(1, 10) . '.jpg';

        return [
            'name' => $this->faker->name,
            'summary' => $this->faker->name,
            'imagen' => "mg/products/{$fileName}",
            'author' => $this->faker->name,
            'calification' => $this->faker->numberBetween(0, 5),
        ];
    }
}
