@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-white flex flex-col items-center justify-center px-6 py-12">

    <!-- Título principal -->
    <h1 class="asla">
      nicks  <span class="aslag">fashion</span>
    </h1>

    <!-- Mensaje de bienvenida -->
    <div class="solid-card">
        <p class="text-lg text-gray-200">
            ¡Hola, <span class="font-semibold text-yellow-400">{{ auth()->user()->name }}</span>! Bienvenido al panel de administración.
        </p>
    </div>

    <!-- Enlaces a CRUD -->
    <div class="solid-card">
        <a href="{{ route('productos.index') }}"
            class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-6 px-4 rounded-2xl shadow-lg text-center transform hover:scale-105 transition-all duration-200">
            Productos
        </a>
    </div>
    <div class="solid-card">
           <a href="{{ route('tipo_productos.index') }}"class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-6 px-4 rounded-2xl shadow-lg text-center transform hover:scale-105 transition-all duration-200">
            
             Tipos de Productos
        </a>
    </div>

   

</div>
@endsection
