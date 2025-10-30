@extends('layouts.app')

@section('content')
<div class="aslamgym-container">
    <h1 class="aslamgym-title">Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" class="aslamgym-form">
        @csrf

        <!-- Grupo Nombre -->
        <div class="aslamgym-form-group">
            <label for="nombre" class="aslamgym-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre') }}" 
                   class="aslamgym-input" required>
            @error('nombre')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>
         <div class="aslamgym-form-group">
            <label for="descripcion" class="aslamgym-label">descripcion</label>
            <input type="text" name="descripcion" id="descripcion" 
                   value="{{ old('descripcion') }}"
                   class="aslamgym-input" required>
            @error('descripcion')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Grupo Precio -->
        <div class="aslamgym-form-group">
            <label for="precio" class="aslamgym-label">Precio</label>
            <input type="number" name="precio" id="precio" 
                   value="{{ old('precio') }}" step="0.01"
                   class="aslamgym-input" required>
            @error('precio')
                <p class="aslamgym-error">{{ $message }}</p>
            @enderror
        </div>

     
        
          <label for="tipo_producto_id" class="aslamgym-labell">tipo_producto_id</label>
        <select class="aslamgym-input" name="tipo_producto_id" id="tipo_producto_id" required>
         @foreach($tipos as $tipo)
         <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
         @endforeach
        </select>

        
           @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    


        <!-- Botones -->
        <div class="aslamgym-btn-group">
            <a href="{{ route('productos.index') }}" class="aslamgym-btn-cancelar">
                Cancelar
            </a>
            <button type="submit" class="aslamgym-btn-guardar">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
