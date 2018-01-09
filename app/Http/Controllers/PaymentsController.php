<?php

namespace App\Http\Controllers;

use App\Services\Doku;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $doku;

    public function __construct(Doku $doku)
    {
        $this->doku = $doku;
    }

    public function dokuRedirect(Request $request) {
        $result = $this->doku->redirect($request);
        if ($result['orderStatus'] == 'completed') {
            return view('frontend.payments.completed', $result);
        } elseif ($result['orderStatus'] == 'on-hold') {
            return view('frontend.payments.on-hold', $result);
        } else {
            return view('frontend.payments.failed', $result);
        }
    }

    public function dokuNotify(Request $request) {
        return $this->doku->notify($request);
    }

}
