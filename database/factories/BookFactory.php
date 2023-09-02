<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'author' => $this->faker->text(255),
            'published_at' => $this->faker->date(),
            'publisher' => $this->faker->text(255),
            'downloads' => $this->faker->randomNumber(0),
            'section_id' => \App\Models\Section::factory(),
            'department_id' => \App\Models\Department::factory(),
        ];
    }
}
