<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscriptions = NewsletterSubscription::latest()->paginate(20);
        return view('admin.newsletter.index', compact('subscriptions'));
    }

    public function destroy(NewsletterSubscription $subscription)
    {
        $subscription->delete();
        return back()->with('success', 'Subscription removed successfully.');
    }
}