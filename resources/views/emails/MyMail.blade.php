@component('mail::message')
# Your Appointment is Approved.

Your Appointment is Approved.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


