@extends('layouts.app')

@section('content')
<div class="aslamgym-container">
    <!-- Título principal -->
    <h1 class="aslamgym-title">Lista de Tipos de Productos</h1>

    <!-- Botón nuevo tipo de producto -->
    <div class="aslamgym-actions">
        <a href="{{ route('tipos-productos.create') }}" class="aslamgym-btn aslamgym-btn-yellow">
            + Nuevo Tipo
        </a>
    </div>

    <!-- Tabla de tipos de productos -->
    <div class="aslamgym-table-container">
        <table class="aslamgym-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre tipo</th>
                   
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td>{{ $tipo->nombre }}</td>
                    <td class="acciones">
                        <a href="{{ route('tipos-productos.edit', $tipo->id) }}" class="btn btn-warning">
                             Editar
                        </a>
                        <form action="{{ route('tipos-productos.destroy', $tipo->id) }}" method="POST" class="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Eliminar este tipo de producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($tipos->isEmpty())
                <tr>
                    <td colspan="4" class="aslamgym-empty">No hay tipos de productos registrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
