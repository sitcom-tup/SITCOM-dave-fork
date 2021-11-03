<x-layouts.app>

    <x-slot name="title">
        Home Register
    </x-slot>

    <x-slot name="styles">
        <style type="text/css">
            html,body {
                height:100%;
                padding:0;
                margin:0;
                background-image: url({{asset('/pictures/tuptbg2.jpg')}});
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: 100% 100%;
            },
        </style>
    </x-slot>

    <x-slot name="content">
        <div id="home-register" 
            data-background="{{asset('/pictures/tuptbg2.jpg')}}">
        </div>
    </x-slot>

</x-layouts.app>