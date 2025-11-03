<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Job;
use App\Models\Post;

class ContactanosController extends Controller
{
    public function index()
    {   


        // Título visual opcional para el layout
        $subject = '';

        // Carga de datos con relaciones
        $partners = Partner::with('tags')->get();
        $jobs = Job::with('tags')->get();
        $posts = Post::with('tags')->get();

        // Renderiza la vista contactanos.blade.php con todos los datos
        return view('contact', compact('subject', 'partners', 'jobs', 'posts'));
    }
}