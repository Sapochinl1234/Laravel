<?php

namespace App\Http\Controllers;

use App\Models\Aliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AliadoController extends Controller
{
    /**
     * Muestra todos los aliados con paginación.
     */
    public function index()
    {
        
        $aliados = Aliado::paginate(6);
        return view('aliados.index', compact('aliados'));
    }

    /**
     * Muestra el detalle de un aliado por ID.
     */
    public function show($id)
    {
        $aliado = Aliado::findOrFail($id);
        return view('aliados.show', compact('aliado'));
    }

    /**
     * Filtra aliados por tipo (educativo, corporativo, bienestar).
     */
    public function tipo($tipo)
    {
        $aliados = Aliado::where('tipo', $tipo)->paginate(6);
        return view('aliados.index', compact('aliados'));
    }

    /**
     * Muestra el formulario para crear un nuevo aliado.
     */
    public function create()
    {
        return view('aliados.create');
    }

    /**
     * Procesa el formulario y guarda el aliado en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|in:educativo,corporativo,bienestar',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('images'), $nombreImagen);

        Aliado::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'imagen' => $nombreImagen,
            'user_id' => Auth::check() ? Auth::user()->id : null,
        ]);

        return redirect()->route('aliados.index')->with('success', 'Aliado creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un aliado existente.
     */
    public function edit($id)
    {
        $aliado = Aliado::findOrFail($id);
        return view('aliados.edit', compact('aliado'));
    }

    /**
     * Actualiza los datos de un aliado en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|in:educativo,corporativo,bienestar',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $aliado = Aliado::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $aliado->imagen = $nombreImagen;
        }

        $aliado->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'imagen' => $aliado->imagen,
        ]);

        return redirect()->route('aliados.index')->with('success', 'Aliado actualizado correctamente.');
    }

    /**
     * Elimina un aliado de la base de datos.
     */
    public function destroy($id)
    {
        $aliado = Aliado::findOrFail($id);
        $aliado->delete();

        return redirect()->route('aliados.index')->with('success', 'Aliado eliminado correctamente.');
    }
}