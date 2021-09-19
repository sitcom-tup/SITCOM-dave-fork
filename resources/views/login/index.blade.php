<x-layouts.app>

    <x-slot name="title">
        Home Login
    </x-slot>

    <x-slot name="styles">
        <style type="text/css">
            html,body {
                height:100%;
                padding:0;
                margin:0;
                background-image: url({{asset('tuptbg2.jpg')}});
                background-size: auto;
                background-repeat: no-repeat;
                background-position: center;
            },
        </style>
    </x-slot>

    <x-slot name="content">
        <div id="home-login" 
            data-background="{{asset('tuptbg2.jpg')}}">
        </div>
    </x-slot>

</x-layouts.app>