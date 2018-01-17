<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function contact() {
    	return view('frontend/contact');
    }

    public function postContact(Request $request) {
 		$contact = Contact::create([
 			'name' => $request->name,
 			'email' => $request->email,
 			'occupation' => $request->occupation,
 			'message' => $request->message
 		]);

 		return redirect('contact-us')->with('message', 'Data has been saved.');
    }
}
