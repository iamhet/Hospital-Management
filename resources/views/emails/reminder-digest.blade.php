@component('mail::message')
# Reminder For Appointment

Tomorrow you have apointment, So please come at Devine Hospital Today anytime .

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
