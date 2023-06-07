<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Productos;
use App\Models\Imgproductos;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
        ]);

        // Crea una nueva categoría con los datos del formulario
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion_corta' => $request->descripcion_corta,
            'descripcion_larga' => $request->descripcion_larga,
        ]);

        // Redirecciona a la página de categorías o a otra ubicación deseada
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
        ]);

        // Encuentra la categoría por su ID
        $categoria = Categoria::findOrFail($id);

        // Actualiza los datos de la categoría con los datos del formulario
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion_corta' => $request->descripcion_corta,
            'descripcion_larga' => $request->descripcion_larga,
        ]);

        // Redirecciona a la página de categorías o a otra ubicación deseada
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categorias_id)
    {
        $categorias_id = Categoria::with('productos.imagenesproductos')->findOrFail($categorias_id);
        foreach ($categorias_id->productos as $productos) {
            foreach ($productos->imagenesproductos as $imagen) {
                $imagenPath = 'storage/app/imagenes/imagenes/' . $imagen->nombre;
                if (Storage::disk('imagenes')->exists($imagenPath)) {
                    Storage::disk('imagenes')->delete($imagenPath);
                }
                // Delete the image records from the database
                $imagen->delete();
            }
            // Delete the product
            $productos->delete();
        }


        $categorias_id->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
