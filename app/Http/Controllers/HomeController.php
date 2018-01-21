<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EqConstructionType;
use App\Models\EqZipcode;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $r = $request->has('r') ? $request->r + 1 : 1;
        $data['types'] = EqConstructionType::all();
        $data['zipcodes'] = EqZipcode::take(100)->get();
        $data['isCalculator'] = true;
        $data['r'] = $r;
        // $data['isContact'] = true;
        // $data['zipcodes'] = EqZipcode::all();
        return view('frontend.home', $data);
    }
}
