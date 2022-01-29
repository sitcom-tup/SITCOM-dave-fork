@component('mail::message')
# Hello {{$user->getFullName()}}, 

You received this email because you have forgotten your password 🤦🏻‍♂️.

@component('mail::button', ['url' =>  config('app.url').'requests/passwords/actions?reset=true&confirmation='.$confirmation.'&email='.$user->email])
Reset Now
@endcomponent

@component('mail::panel')
    Click on the link to reset your password!
@endcomponent

Thanks,<br>
From the {{ config('app.name') }} team
@endcomponent