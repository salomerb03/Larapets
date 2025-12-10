<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

@php
    if (Auth::user()->role == 'Administrador') {
        $image = 'images/fondo_admin.png';
    } else {
        $image = 'images/fondo_visitante.png';
    }
@endphp

<body
    class="min-h-[100dvh] bg-[url({{ asset($image) }})] bg-cover bg-fixed w-full flex flex-col gap-4 items-center justify-center p-8">
    @include('layouts.navbar')
    @if(Auth::check() && Auth::user()->role == 'Administrador')
        @include('partials.admin_flash')
    @endif
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" referrerpolicy="no-referrer"></script>
    @yield('js')
    

</body>

</html>
