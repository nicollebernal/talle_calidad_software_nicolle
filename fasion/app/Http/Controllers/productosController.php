<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\TipoProducto;

class ProductosController extends Controller
{
    // 📄 Mostrar todos los productos
    public function index()
    {
        $productos = Productos::with('TipoProducto')->get();
        return view('productos.index', compact('productos'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        $tipos = TipoProducto::all();
        return view('productos.create', compact('tipos'));
    }

    // 💾 Guardar nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
        ]);

        Productos::create($validated);

        return redirect()->route('productos.index')
            ->with('success', '✅ Producto creado correctamente.');
    }

    // 👁️ Mostrar un solo producto
    public function show($id)
    {
        $producto = Productos::with('TipoProducto')->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    // ✏️ Formulario de edición
    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        $tipos = TipoProducto::all();
        return view('productos.edit', compact('producto', 'tipos'));
    }

    // 🔄 Actualizar producto
    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')
            ->with('success', '✅ Producto actualizado correctamente.');
    }

    // 🗑️ Eliminar producto
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
