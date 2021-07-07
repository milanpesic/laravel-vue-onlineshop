<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{


    public function contact(Request $request) {

        if($request->isMethod('post')) {

            $data = $request->validate([
                'name' => ['required', 'min:3', 'max:100'],
                'email' => ['required', 'email'],
                'message' => ['required', 'min:3', 'max:255']
            ]);
    
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]);

            return redirect('home')->with('contact-success', '<div class="fw-bold fs-5">Thank you for sending us your message.</div><div class="small">Our admins will contact you soon.</div>');

        }
    
        return view('contact.index');
        
    }
}
