<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class PaginaPrincipalController extends Controller
{
    public function index()
    {
        $greeting = '¡Hola, estudiante!';
        $name = 'Estudiante de la U de Caldas';
        $jobs = Job::with('companyRelation')->latest()->get();

        return view('home', compact('greeting', 'name', 'jobs'));
    }
}