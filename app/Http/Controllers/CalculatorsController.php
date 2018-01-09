<?php

namespace App\Http\Controllers;

use App\Models\EqConstructionType;
use App\Models\EqRate;
use App\Models\EqZipcode;
use App\Models\FlConstructionClass;
use App\Models\FlConstructionType;
use App\Models\FlRate;
use App\Models\FloZipcode;
use Illuminate\Http\Request;

class CalculatorsController extends Controller
{
    public function flexa()
    {
        $data['types'] = FlConstructionType::all();
        $data['classes'] = FlConstructionClass::all();
        return view('frontend.calculators.flexa', $data);
    }

    public function flexaResult(Request $request)
    {
        $type = $request->construction_type;
        $class = $request->construction_class;
        $tsi = $request->tsi;
        $rsdmcc = $request->has('rsmdcc') ? 0.025 : 0;
        $dlv = $request->has('dlv') ? 0.01 : 0;
        $data['result'] = $this->calculateFlexa($tsi, $type, $class, $rsdmcc, $dlv);
        return view('frontend.calculators.flexa-result', $data);
    }

    public function flood()
    {
        $data['zipcodes'] = FloZipcode::take(100)->get();
        return view('frontend.calculators.flood', $data);
    }

    public function floodResult(Request $request)
    {
        $tsi = $request->tsi;
        $zipcode = $request->zipcode;
        $data['result'] = $this->calculateFlood($tsi, $zipcode);
        return view('frontend.calculators.flood-result', $data);
    }

    public function earthquake() {
        $data['types'] = EqConstructionType::all();
        $data['zipcodes'] = EqZipcode::take(100)->get();
        return view('frontend.calculators.earthquake', $data);
    }

    public function earthquakeResult(Request $request) {
        $tsi = $request->tsi;
        $type = $request->construction_type;
        $zipcode = $request->zipcode;
        $data['result'] = $this->calculateEarthquake($tsi, $type, $zipcode);
        return view('frontend.calculators.earthquake-result', $data);
    }

    protected function calculateFlexa($tsi, $type, $class, $rsdmcc, $dlv)
    {
        $qRate = FlRate::where('fl_construction_type_id', $type)
                    ->where('fl_construction_class_id', $class)
                    ->first();
        $rate = $qRate->rate;
        $allRate = $rate + $rsdmcc + $dlv;
        return ($allRate * $tsi)/100;
    }

    protected function calculateFlood($tsi, $zipcode)
    {
        $qRate = FloZipcode::where('id', $zipcode)->first();
        $rate = $qRate->rate;
        return ($rate/100) * $tsi;
    }

    protected function calculateEarthquake($tsi, $type, $zipcode)
    {
        $qZone = EqZipcode::where('id', $zipcode)->first();
        $zone = $qZone->zone;
        $qRate = EqRate::where('eq_construction_type_id', $type)
                    ->where('zone', $zone)
                    ->first();
        $rate = $qRate->rate;
        return ($rate/100) * $tsi;
    }
}
