@component('mail::message')
# Confirm Your Subscription

Thank you for subscribing to our newsletter! Please click the button below to confirm your email address.

@component('mail::button', ['url' => route('newsletter.confirm', $subscription->token)])
Confirm Subscription
@endcomponent

If you didn't request this subscription, you can safely ignore this email.

Thanks,<br>
School of Thoughts Ghana
@endcomponent