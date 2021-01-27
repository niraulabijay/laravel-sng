@component('mail::message')
# Package Enquiry

From : {{ $packageSubmission->name }}, {{ $packageSubmission->email }}

Contact No: {{ $packageSubmission->phone }}

Package : {{ $packageSubmission->package->title }}

Preferred Tour Date: {{ $packageSubmission->tour_date }}
No. of Persons : {{ $packageSubmission->no_of_persons }}

Details:
{{$packageSubmission->message}}


Admin,<br>
{{ env('APP_NAME') }}
@endcomponent
