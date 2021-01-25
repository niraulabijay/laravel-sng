@component('mail::message')
# Message

{{$contact->message}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent