<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // ✅ Importar el modelo Post
use App\Models\Tag;  // ✅ Importar el modelo Tag

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $tags = collect(explode(',', $request->tags))->map(fn($t) => trim($t))->filter();
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);

        return redirect()->back()->with('success', 'Publicación enviada correctamente.');
    }
}