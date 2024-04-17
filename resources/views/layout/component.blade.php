<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    @vite('public/css/app.css')

    {{-- Links --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

</head>

<body>
    @yield('content-component')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/dist/cdn.min.js"></script>
</body>

</html>
