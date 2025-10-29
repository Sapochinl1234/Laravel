<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;


class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
        'title' => $this->faker->jobTitle(),
        'Salary' => $this->faker->numberBetween(3000000, 10000000),
        'details' => $this->faker->paragraph(),
        'company_id' => Company::factory(),
        ];

    }
}