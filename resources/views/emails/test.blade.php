@component('mail::message')
# Test Email from School of Thoughts Ghana

This is a test email sent from your application's email configuration.

**Time Sent:** {{ $currentTime }}

@component('mail::button', ['url' => config('app.url')])
Visit Site
@endcomponent

Thanks,<br>
School of Thoughts Ghana
@endcomponent