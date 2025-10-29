<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        \App\Models\Tag::factory()->count(10)->create();
        \App\Models\User::factory()->count(10)->create();

        $this->call([
            CompanySeeder::class,
            JobSeeder::class,
        ]);
    }
}