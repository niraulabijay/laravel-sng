@component('mail::message')
# Message

From : {{ $contact->name }}, {{ $contact->email }}

Subject: {{ $contact->subject }}


{{$contact->message}}


Admin,<br>
{{ config('app.name') }}
@endcomponent