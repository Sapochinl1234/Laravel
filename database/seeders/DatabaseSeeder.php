<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Crear 10 tags
        Tag::factory()->count(10)->create();

        // Crear 10 usuarios
        \App\Models\User::factory()->count(10)->create();

        // Crear 10 posts y asociarles 3 tags aleatorios a cada uno
        Post::factory(10)->create()->each(function ($post) {
            $tags = Tag::factory(3)->create();
            $post->tags()->attach($tags->pluck('id'));
        });

        // Ejecutar otros seeders si existen
        $this->call([
            CompanySeeder::class,
            JobSeeder::class,
        ]);
    }
}
