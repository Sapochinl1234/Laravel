<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;
use App\Models\Tag;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::all();

        Company::all()->each(function ($empresa) use ($tags) {
            Job::factory()->count(3)->create([
                'company_id' => $empresa->id
            ])->each(function ($job) use ($tags) {
                $job->tags()->sync($tags->random(rand(1, 3))->pluck('id')->toArray());
            });
        });
    }
}