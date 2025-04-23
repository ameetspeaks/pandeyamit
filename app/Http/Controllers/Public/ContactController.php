<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        // Send email
        Mail::to(config('mail.admin_email'))->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message. I will get back to you soon!');
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:newsletters,email']
        ]);

        Newsletter::create($validated);

        return back()->with('success', 'Thank you for subscribing to my newsletter!');
    }

    public function unsubscribe($email)
    {
        Newsletter::where('email', $email)->delete();

        return back()->with('success', 'You have been successfully unsubscribed.');
    }
} 