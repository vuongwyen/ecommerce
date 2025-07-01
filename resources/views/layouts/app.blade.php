<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fashion Ecommerce')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50">
    @livewire('partials.navbar')
    <main>
        @yield('content')
    </main>
    @livewire('product-quick-view')
    @livewireScripts
</body>

</html>