<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use App\Models\Company;

class JobController extends Controller
{
    // Mostrar todos los empleos con filtros
    public function index(Request $request)
    {
        $query = Job::with('tags', 'company');

        if ($request->filled('company')) {
            $query->where('company_id', $request->company);
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $request->tag));
        }

        if ($request->filled('min_salary')) {
            $query->where('Salary', '>=', $request->min_salary);
        }

        $jobs = $query->get();
        $companies = Company::all();
        $tags = Tag::all();

        return view('jobs.listado', compact('jobs', 'companies', 'tags'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $tags = Tag::all();
        $companies = Company::all();
        return view('jobs.nuevo', compact('tags', 'companies'));
    }

    // Guardar nuevo empleo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'Salary' => 'required|numeric',
            'details' => 'required|string',
            'company_id' => 'nullable|exists:companies,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $job = Job::create($request->only(['title', 'Salary', 'details', 'company_id']));
        $job->tags()->sync($request->tags ?? []);

        return redirect()->route('jobs.listado')->with('success', 'Empleo creado correctamente.');
    }

    // Mostrar detalle de un empleo
    public function show(Job $job)
    {
        $job->load('tags', 'company');

        $relacionadosEmpresa = Job::where('company_id', $job->company_id)
                                  ->where('id', '!=', $job->id)
                                  ->take(5)->get();

        $relacionadosEtiqueta = Job::whereHas('tags', function ($query) use ($job) {
            $query->whereIn('tags.id', $job->tags->pluck('id'));
        })->where('id', '!=', $job->id)->take(5)->get();

        return view('jobs.detalle', compact('job', 'relacionadosEmpresa', 'relacionadosEtiqueta'));
    }

    // Mostrar formulario de edición
    public function edit(Job $job)
    {
        $tags = Tag::all();
        $companies = Company::all();
        $job->load('tags');
        return view('jobs.modificar', compact('job', 'tags', 'companies'));
    }

    // Actualizar empleo
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'Salary' => 'required|numeric',
            'details' => 'required|string',
            'company_id' => 'nullable|exists:companies,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $job->update($request->only(['title', 'Salary', 'details', 'company_id']));
        $job->tags()->sync($request->tags ?? []);

        return redirect()->route('jobs.listado')->with('success', 'Empleo actualizado correctamente.');
    }

    // Eliminar empleo
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.listado')->with('success', 'Empleo eliminado.');
    }

    // Mostrar etiquetas asociadas a un empleo (opcional)
    public function showTags($id)
    {
        $job = Job::findOrFail($id);
        $tags = $job->tags;

        return view('jobs.tags', compact('job', 'tags'));
    }
}