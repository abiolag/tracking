<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            // Send email (you'll need to configure your .env for mail)
            Mail::send([], [], function ($message) use ($request) {
                $message->to('admin@molpsg.com')
                        ->subject('MOLPSG Contact Form: ' . $request->subject)
                        ->setBody(
                            "Name: {$request->name}\n" .
                            "Email: {$request->email}\n" .
                            "Phone: {$request->phone}\n" .
                            "Subject: {$request->subject}\n\n" .
                            "Message:\n{$request->message}",
                            'text/plain'
                        );
            });

            return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');

        } catch (\Exception $e) {
            // If email fails, still show success but log the error
            \Log::error('Contact form email failed: ' . $e->getMessage());
            
            return redirect()->route('contact')->with('success', 'Thank you for your message! We have received your inquiry and will contact you shortly.');
        }
    }
}