@extends('layouts.app')

@section('content')
<div class="aslamgym-container">
    <!-- Título principal -->
    <h1 class="aslamgym-title">Lista de Productos</h1>

    <!-- Botón nuevo producto -->
    <div class="aslamgym-actions">
        <a href="{{ route('productos.create') }}" class="aslamgym-btn aslamgym-btn-yellow">
            + Nuevo Producto
        </a>
    </div>

    <!-- Tabla de productos -->
    <div class="aslamgym-table-container">
        <table class="aslamgym-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>Precio</th>
                    <th>tipo_producto_id</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                     <td>{{ $producto->precio }}</td>
                       <td>{{ $producto->tipo_producto_id }}</td>

                    <td class="acciones">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($productos->isEmpty())
                <tr>
                    <td colspan="4" class="aslamgym-empty">No hay productos registrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
