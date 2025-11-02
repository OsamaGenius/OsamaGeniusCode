<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- Contorl Panel Title --}}
        <title>{{ $title ?? 'OsamaGenius Dashboard' }}</title>
                
        {{-- Styles / Scripts --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @else
            <style>
                
            </style>
        @endif

    </head>
    <body>
        {{ $slot }}
    </body>
</html>
