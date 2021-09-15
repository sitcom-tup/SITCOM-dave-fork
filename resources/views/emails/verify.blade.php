
@component('mail::message')
# Hello, 

You are receiving this email because {{$user->getFullName()}}, has requested on you to verify this account.

@component('mail::button', ['url' =>  config('app.url') ])
Verify Now
@endcomponent

@component('mail::panel')
    In order for her/him to login on to the system, account verification from coordinator like you is needed to verify the account.
@endcomponent

Thanks,<br>
From the {{ config('app.name') }} team
@endcomponent