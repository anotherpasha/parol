<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegistrant;
use App\Models\Contact;
use App\Models\Registrant;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function contact() {
    	$data['isContactUs'] = true;
    	return view('frontend/contact', $data);
    }

    public function postContact(PostRegistrant $request) {
    	$params = [
    		'name' => $request->name,
 			'email' => $request->email,
 			'phone' => $request->phone,
 			'occupation' => $request->occupation,
 			
    	];

    	if ($request->has('package')) {
    		$params['product'] = $request->package;
    	}

    	if ($request->has('message')) {
    		$params['message'] = $request->message;
    	}

 		$contact = Registrant::create($params);

 		return redirect('contact-us')->with('message', 'Data has been saved.');
    }


}
