<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Pup Paw Shop</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        
    </head>
    <body>
        <livewire:header/>
        <livewire:hero-section/>
        <livewire:product-section />
        <livewire:footer/>
    </body>
</html>
