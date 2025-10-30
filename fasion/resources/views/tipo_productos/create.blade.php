@extends('layouts.app')

@section('content')
<div class="aslamgym-container">
    <h1 class="aslamgym-title">Crear Tipo de Producto</h1>

    <form action="{{ route('tipos-productos.store') }}" method="POST" class="aslamgym-form">
        @csrf

        <!-- Grupo Nombre -->
        <div class="aslamgym-form-group">
            <label for="nombre" class="aslamgym-label">nombre tipo</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre') }}" 
                   class="aslamgym-input" required>
            @error('nombre')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>

        

        <!-- Botones -->
        <div class="aslamgym-btn-group">
            <a href="{{ route('tipos-productos.index') }}" class="aslamgym-btn-cancelar">
                Cancelar
            </a>
            <button type="submit" class="aslamgym-btn-guardar">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
