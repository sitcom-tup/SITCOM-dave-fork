@component('mail::message')
# Hello {{$user->getFullName()}}, 

You are receiving this email because your email has now been verified by your coordinator.

@component('mail::button', ['url' =>  config('app.url') ])
Login Now
@endcomponent

@component('mail::panel')
    You can now login to SITCOM system
@endcomponent

Thanks,<br>
From the {{ config('app.name') }} team
@endcomponent