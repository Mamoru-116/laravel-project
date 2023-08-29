<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
        <title>Form</title>
    </head>
    <body class="antialiased bg-gray-300">
        {{ $slot }}
    </body>
</html>
