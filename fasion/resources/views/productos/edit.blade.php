@extends('layouts.app')

@section('content')
<div class="aslamgym-container">
    <h1 class="aslamgym-title">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="aslamgym-form">
        @csrf
        @method('PUT')

        <!-- Grupo Nombre -->
        <div class="aslamgym-form-group">
            <label for="nombre" class="aslamgym-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre', $producto->nombre) }}" 
                   class="aslamgym-input" requi  red>
            @error('nombre')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Grupo Precio -->
        <div class="aslamgym-form-group">
            <label for="descripcion" class="aslamgym-label">descripcion</label>
            <input type="text" name="descripcion" id="descripcion" 
                   value="{{ old('descripcion', $producto->descripcion) }}" 
                   class="aslamgym-input" required>
            @error('descripcion')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>

            <div class="aslamgym-form-group">
            <label for="precio" class="aslamgym-label">Precio</label>
            <input type="number" name="precio" id="precio" 
                   value="{{ old('precio', $producto->precio) }}" step="0.01"
                   class="aslamgym-input" required>
            @error('precio')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>
            
            <label for="tipo_producto_id" class="aslamgym-labell">Tipo de producto:</label>
        <select class="aslamgym-input" name="tipo_producto_id" id="tipo_producto_id" required>
         @foreach($tipos as $tipo)
         <option value="{{ $tipo->id }}">{{ $tipo->nombre}}</option>
         @endforeach
        </select>

          
           

        <!-- Botones -->
        <div class="aslamgym-btn-group">
            <a href="{{ route('productos.index') }}" class="aslamgym-btn-cancelar">
                Cancelar
            </a>
            <button type="submit" class="aslamgym-btn-guardar">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
