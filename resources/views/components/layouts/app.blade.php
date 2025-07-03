<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Beautify' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50">
    @livewire('partials.navbar')
    <main>{{ $slot }}</main>
    @livewire('partials.footer')
    @livewire('product-quick-view')
    @livewireScripts
</body>

</html>