<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/aslamgym.css') }}">

    <!-- OVERRIDE RÁPIDO: forzar tema ASLAMGYM (pegar aquí) -->
    <style>
      /* fondo general degradado */
      html, body {
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 90, 227, 1) 20%, rgba(255, 171, 220, 1) 48%, rgba(255, 87, 233, 1) 84%) fixed !important;
        color: #fff !important;
      }

      /* hacer transparente cualquier contenedor con bg-white dentro del main */
      main, main * {
        background: transparent !important;
        box-shadow: none !important;
        border-color: transparent !important;
        color: inherit !important;
      }

      /* específicamente anular clases de Tailwind/Breeze que generan recuadros blancos */
      main .bg-white, main .bg-gray-100, main .bg-gray-50,
      main .shadow, main .shadow-sm, main .rounded, main .overflow-hidden,
      main .prose, main .container, main .card, main .panel, main .p-6,
      main .max-w-7xl, main .mx-auto {
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
      }

      /* inputs y formularios: oscurecer para que no queden blancos */
      main input, main textarea, main select {
        background: #fff !important;
        color: #000 !important;
        border: 1px solid #fff !important;
      }

      /* tablas y celdas */
      main table, main thead, main tbody, main tr, main td, main th {
        background: transparent !important;
        color: inherit !important;
        border-color: rgba(255,255,255,0.06) !important;
      }

      /* si quieres que algunas cajas sigan siendo "tarjetas" oscuras, usa .aslam-card */
      .aslam-card {
        background: linear-gradient(180deg,#0b0f13,#13181d) !important;
        border: 1px solid rgba(255,204,0,0.08) !important;
        border-radius: 10px !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.6) !important;
        padding: 18px !important;
        color: #fff !important;
      }

      /* encabezados amarillos */
      main h1, main h2, main h3, main h4 {
        color: #fff!important;
      }
   

    </style>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('build/assets/aslamgym.css') }}">
</head>
<body class="font-sans antialiased bg-gradient-to-br from-black via-gray-900 to-gray-800 text-white min-h-screen flex flex-col">

    <!-- 🔹 Barra de navegación -->
    <div class="bg-transparent shadow-none border-none">
        @include('layouts.navigation')
    </div>

    <!-- 🔹 Encabezado (solo si existe) -->
    @isset($header)
        <header class="bg-transparent border-none shadow-none">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- 🔹 Contenido principal -->
    <main class="flex-1 py-10 px-6">
        @yield('content')
    </main>

</body>
</html>
