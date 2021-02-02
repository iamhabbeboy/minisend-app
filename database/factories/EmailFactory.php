<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender' => $this->faker->unique()->safeEmail,
            'subject' => $this->faker
            ->sentence(6, true),
            'recipient' => $this->faker->unique()->safeEmail,
            'content' => $this->faker->text,
            'status' => 'posted',
        ];
    }
}
