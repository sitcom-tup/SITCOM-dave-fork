<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>
        
        {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/poppinsFont.css')}}"> --}}
        {{ $styles ?? ''}}
        
    </head>
    <body>
    

        <div id="app" >
            {{ $content }}
        </div>
        

        {{-- change domain localhost:3000 as we deploy --}}
        {{-- <script src="http://localhost:3000/socket.io/socket.io.js"></script> --}}
        
        <script src="{{ asset('js/app.js') }}"></script>
    
    </body>
</html>