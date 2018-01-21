<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegistrant;
use App\Models\Contact;
use App\Models\Registrant;
use App\Services\Contact as ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    private $contact;

    public function __construct(ContactService $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        $data['pageTitle'] = 'Contact';
        return view('admin.contacts.index', $data);
    }

    public function datatableList()
    {
        return $this->contact->datatable();
    }

    public function download()
    {
        Excel::create('contacts', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                $header = ['Name', 'Email', 'Phone', 'Call Date', 'Call Time', 'Message'];
                $sheet->row(1, $header);
                $sheet->fromModel($this->contact->exported(), null, 'A2', false, false);
            });
        })->download('xls');
    }

    
    public function contact() {
    	// $data['isContactUs'] = true;
        $data = [];
    	return view('frontend/contact', $data);
    }

    public function postContact(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('contact-us#contact-form')
                ->withErrors($validator)
                ->withInput();
        }
        
    	$params = [
    		'name' => $request->name,
 			'email' => $request->email,
 			'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'occupation' => 'contact'			
    	];

    	if ($request->has('message')) {
    		$params['message'] = $request->message;
    	}

 		$contact = Contact::create($params);

 		return redirect('contact-us#contact-form')->with('message', 'Data has been saved.');
    }


}
