@component('mail::message')
# Wellcome

Hi {{ $user->name }}
<br>
Wellcome to laracamp, your account has been created succesfully. Now you can choose your best match camp!.

@component('mail::button', ['url' => route('login')])
Login here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent