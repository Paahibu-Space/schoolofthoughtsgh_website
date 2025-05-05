<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterConfirmation;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscriptions,email'
        ]);

        $subscription = NewsletterSubscription::create([
            'email' => $request->email,
            'is_active' => false
        ]);

        // Send confirmation email
        Mail::to($request->email)->send(new NewsletterConfirmation($subscription));

        return back()->with('newsletter_success', 'Please check your email to confirm your subscription!');
    }

    public function confirm($token)
    {
        $subscription = NewsletterSubscription::where('token', $token)->firstOrFail();

        if (!$subscription->verified_at) {
            $subscription->markAsVerified();
            return redirect('/')->with('newsletter_success', 'Thank you for confirming your subscription!');
        }

        return redirect('/')->with('newsletter_info', 'Your subscription is already confirmed.');
    }

    public function unsubscribe($token)
    {
        $subscription = NewsletterSubscription::where('token', $token)->firstOrFail();
        $subscription->update(['is_active' => false]);

        return redirect('/')->with('newsletter_info', 'You have been unsubscribed from our newsletter.');
    }
}