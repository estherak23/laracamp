
@component('mail::message')
# Your Transaction Has Been Confirmed

Hi {{ $checkout->User->name }}
<br>

Your transaction has been confirmed, now you can take benefits of <b>{{ $checkout->Camp->title }}</b> camp.

@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent