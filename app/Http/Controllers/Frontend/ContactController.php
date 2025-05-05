<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use App\Mail\ContactAutoReplyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display the contact form
     */
    public function index()
    {
        return view('contact');
    }
    
    /**
     * Process the contact form submission
     */
    public function send(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            // 'g-recaptcha-response' => 'required|recaptcha',
        ]);
        
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        try {
            // Store contact message in database
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            // Send email to admin
            Mail::to(config('mail.admin_address'))
                ->send(new ContactFormMail($contact));
            
            // Send auto-reply email to user
            Mail::to($request->email)
                ->send(new ContactAutoReplyMail($contact));
            
            // Return response
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent successfully! We will get back to you soon.'
                ]);
            }
            
            return redirect()->back()
                ->with('success', 'Your message has been sent successfully! We will get back to you soon.');
                
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, there was an error sending your message. Please try again later.'
                ]);
            }
            
            return redirect()->back()
                ->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                ->withInput();
        }
    }
}