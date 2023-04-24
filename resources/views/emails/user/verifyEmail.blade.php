@component('mail::message')
# Verify your email address

Thank you for registering an account on Edata. We are glad to have you as a part of this community of bosses.  Enter the code below to verify your email address.

@component('mail::panel')
{{$code}}
@endcomponent

Also do not share the code above with anyone for security reasons.
Thanks,<br>
{{ config('app.name') }}
@endcomponent
