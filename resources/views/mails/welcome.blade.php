@component('mail::message')
# Welcome To My Auth Mailing Course

The body of your message.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent