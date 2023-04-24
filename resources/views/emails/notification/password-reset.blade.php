@component('mail::message')
# Account action notification

You just changed your password on {{ config('app.name') }} website, this is to notify you of the change.
If the request wasn't generated by you, kindly reach out to this email

Warm regards,
{{ config('app.name') }} security team.

{{ config('app.name') }}
@endcomponent