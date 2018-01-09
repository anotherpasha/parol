<?php

namespace App\Http\Controllers;

use App\Mail\ClaimPosted;
use App\Mail\UserRegistered;
use App\Models\Registrant;
use App\Services\Claim;
use App\Services\Doku;
use App\Services\Parolamas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    protected $parolamas;
    protected $doku;
    protected $claim;

    public function __construct(Parolamas $parolamas, Doku $doku, Claim $claim)
    {
        $this->parolamas = $parolamas;
        $this->doku = $doku;
        $this->claim = $claim;
    }

    public function registration()
    {
        return view('frontend/registration');
    }

    public function postRegistration(Request $request)
    {
        $registrant = Registrant::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        if ($registrant) {
            Mail::to('pasha.md5@gmail.com')
                ->send(new UserRegistered($registrant));
        }
        return redirect('/registration');
    }

    public function claim()
    {
        return view('frontend/claim');
    }

    public function postClaim(Request $request)
    {
        $claim = $this->claim->save($request);
        if ($claim) {
            Mail::to('pasha.md5@gmail.com')
                ->send(new ClaimPosted($claim));
        }
        return redirect('/claim');
    }

    public function payment()
    {
        return view('frontend/payment');
    }

    public function paymentDetail(Request $request)
    {
        $policyNumber = $request->policy_number;
        $billingDetail = $this->parolamas->getBilling($policyNumber);
        $data['billingDetail'] = $billingDetail;
        $data['dokuParams'] = $this->doku->getParameters($billingDetail);
        return view('frontend/payment-detail', $data);
    }

    public function migrateCity()
    {
        DB::table('ref_province')->orderBy('kota')->chunk(1000, function ($provinces) {
            foreach ($provinces as $prov) {
                $theProv = DB::table('provinces')->where('name', $prov->propinsi)->first();
                DB::table('cities')->insert(
                    ['province_id' => $theProv->id, 'name' => $prov->kota]
                );
            }
        });
    }
}
