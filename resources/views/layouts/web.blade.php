<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    @vite(['resources/sass/guest.scss', 'resources/js/app.js'])
</head>

<body class="h-screen">
    @livewire('menu')

    <div class="font-sans">
        @yield('content')
    </div>

    @livewire('footer')
</body>

</html>
