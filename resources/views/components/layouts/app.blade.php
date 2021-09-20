<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap" rel="stylesheet">
        {{ $styles ?? ''}}
        
    </head>
    <body>
        <div id="app">
            {{ $content }}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>