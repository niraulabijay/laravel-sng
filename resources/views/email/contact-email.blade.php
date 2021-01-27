@component('mail::message')
# Message

From : {{ $contact->name }}, {{ $contact->email }}

Subject: {{ $contact->subject }}


{{$contact->message}}


Admin,<br>
{{ env('APP_NAME') }}
@endcomponent