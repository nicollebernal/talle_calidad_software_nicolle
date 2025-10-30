<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProducto;

class TipoProductosController extends Controller
{
    /**
     * 📋 Mostrar todos los tipos de productos
     */
    public function index()
    {
        $tipos = TipoProducto::all();
        return view('tipo_productos.index', compact('tipos'));
    }

    /**
     * ➕ Mostrar formulario de creación
     */
    public function create()
    {
        return view('tipo_productos.create');
    }

    /**
     * 💾 Guardar un nuevo tipo de producto
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        TipoProducto::create($validated);

        return redirect()->route('tipo_productos.index')
            ->with('success', '✅ Tipo de producto creado correctamente.');
    }

    /**
     * 👁️ Mostrar un tipo de producto específico
     */
    public function show(string $id)
    {
        $tipo = TipoProducto::findOrFail($id);
        return view('tipo_productos.show', compact('tipo'));
    }

    /**
     * ✏️ Mostrar formulario de edición
     */
    public function edit(string $id)
    {
        $tipo = TipoProducto::findOrFail($id);
        return view('tipo_productos.edit', compact('tipo'));
    }

    /**
     * 🔄 Actualizar un tipo de producto existente
     */
    public function update(Request $request, string $id)
    {
        $tipo = TipoProducto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipo->update($validated);

        return redirect()->route('tipo_productos.index')
            ->with('success', '✅ Tipo de producto actualizado correctamente.');
    }

    /**
     * 🗑️ Eliminar un tipo de producto
     */
    public function destroy(string $id)
    {
        $tipo = TipoProducto::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipo_productos.index')
            ->with('success', '🗑️ Tipo de producto eliminado correctamente.');
    }
}
