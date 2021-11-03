<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name'                     => $this->faker->firstName.' '.$this->faker->firstName,
            'lastname'                 => $this->faker->lastName.' '.$this->faker->lastName,
            'email'                    => $this->faker->unique()->safeEmail,
            'document_identification'  => Str::random(10),
            'email_verified_at'        => now(),
            'password'                 => Hash::make('123456'),
            'remember_token'           => Str::random(10),
            'phone'                    => '+593963631319',
            'type'                     => 'user',
            'parish_id'                => 1,
            'created_at'               => $this->faker->dateTimeBetween('now', '+90 days')
        ];
    }
}
