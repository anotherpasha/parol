<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use App\Models\EqConstructionType;
use App\Models\EqRate;
use App\Models\EqZipcode;
use App\Models\FlConstructionClass;
use App\Models\FlConstructionType;
use App\Models\FlRate;
use App\Models\FloZipcode;
use App\Services\Calculator as CalcService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CalculatorsController extends Controller
{
    private $calculator;

    public function __construct(CalcService $calculator)
    {
        $this->calculator = $calculator;
    }

    public function index()
    {
        $data['pageTitle'] = 'Calculator';
        return view('admin.calculators.index', $data);
    }

    public function datatableList()
    {
        return $this->calculator->datatable();
    }

    public function download()
    {
        Excel::create('calculators', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                $header = ['Nama', 'Email', 'Telp', 'Call Date', 'Call Time', 'Status Kepemilikan', 'Kodepos', 'Jenis Bangunan', 'Lantai', 'Penggunaan Bangunan', 'Jenis Bahan Bangunan', 'Produk', 'Nilai Bangunan', 'Nilai Isi', 'Flexa', 'RSMDCC', 'DLV', 'Flood', 'Earthquake'];
                $sheet->row(1, $header);
                $sheet->fromModel($this->calculator->exported(), null, 'A2', false, false);
            });
        })->download('xls');
    }


    public function calculatorResult(Request $request)
    {
        Log::warning(json_encode($request->all()));
        $constType = '';
        $constClass = '';
        $buildingType = $request->building_type;
        $floor = 0;
        // apartment
        if ($buildingType == 1) {
            $constClass = 1;
            $floor = $request->floor;
            $type = 1;
            if ($floor < 6) {
                $constType = 1;
            } else if ($floor >= 6 && $floor < 18) {
                $constType = 2;
            } else if ($floor >= 18 && $floor < 24) {
                $constType = 3;
            } else {
                $constType = 5;
            }
        } else {
            $constClass = 1;
            $type = 4;
            $constType = $request->house_type;
            Log::warning('housttype' . $request->house_type);
            $wood = $request->wood_element;
            if ($wood == 1) {
                $constClass = 2;
            }
        }

        // Log::warning('constclass ' . $constClass);
        // Log::warning('constType' . $constType);

        $rsmdcc = $request->has('rsmdcc') ? 0.025 : 0;
        $dlv = $request->has('dlv') ? 0.01 : 0;

        $building = $request->has('building_value') ? str_replace(",","",$request->building_value) : 0;
        $content = $request->has('content_value') ? $request->content_value : 0;
        $content = $content != '' ? str_replace(",","",$request->content_value) : 0;
        $tsi = $building + $content;

        $flexa = $this->calculateFlexa($tsi, $constType, $constClass, $rsmdcc, $dlv);

        $flood = 0;
        $eq = 0;
        $zipcode = $request->zipcode;
        $buildingStatusName = ($request->building_status == 1 ? 'Pribadi' : 'Sewa');
        $buildingTypeName = ($buildingType == 1 ? 'Apartemen' : 'Rumah Tinggal');

        if ($request->has('flood')) {
            $flood = $this->calculateFlood($tsi, $zipcode);
        }

        if ($request->has('earthquake')) {
            // $type = $request->eq_type;
            $eq = $this->calculateEarthquake($tsi, $type, $zipcode);
        }
        
        $qFlConstType = FlConstructionType::find($constType);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $date = $request->date;
        $time = $request->time;




        $calc = Calculator::create([
            'building_status' => $buildingStatusName,
            'zipcode' => $zipcode,
            'building_type' => $buildingTypeName,
            'floor' => $floor,
            'construction_type' => $qFlConstType->code,
            'construction_class' => $constClass,
            'package' => $request->package,
            'building_value' => $building,
            'content_value' => $content,
            'flexa' => $flexa,
            'rsmdcc' => $rsmdcc,
            'dlv' => $dlv,
            'flood' => $flood,
            'earthquake' => $eq,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'date' => $date,
            'time' => $time
        ]);

        // $data['name'] = $request->name;
        $data['calcId'] = $calc->id;
        $data['flexa'] = $flexa;
        $data['flood'] = $flood;
        $data['eq'] = $eq;
        $data['package'] = $request->package;
        $data['result'] = number_format($flexa + $flood + $eq, 0, ',', '.');
        Log::warning(json_encode($data));
        if ($request->ajax()) {
            return response()->json($data);
        }

        return view('frontend.calculators.calculator-result', $data);
    }

    protected function calculateFlexa($tsi, $type, $class, $rsdmcc, $dlv)
    {
        $qRate = FlRate::where('fl_construction_type_id', $type)
                    ->where('fl_construction_class_id', $class)
                    ->first();
        $rate = $qRate->rate;
        Log::warning('flexarate ' . $rate);
        $allRate = $rate + $rsdmcc + $dlv;
        return ($allRate * $tsi)/100;
    }

    protected function calculateFlood($tsi, $zipcode)
    {
        // $qZc = EqZipcode::where('id', $zipcode)->first();
        // $zc = $qZc->zipcode;
        // Log::warning(json_encode($zc));
        $qRate = FloZipcode::where('zipcode', $zipcode)->first();
        if ($qRate === null) {
            $rate = 0;
        } else 
        {
            $rate = $qRate->rate;
        }
        return ($rate/100) * $tsi;
    }

    protected function calculateEarthquake($tsi, $type, $zipcode)
    {
        $qZone = EqZipcode::where('zipcode', $zipcode)->first();
        if ($qZone === null) {
            $zone = 4;
        } else 
        {
            $zone = $qZone->zone;
            $qRate = EqRate::where('eq_construction_type_id', $type)
                        ->where('zone', $zone)
                        ->first();
            if ($qRate === null) {
                $rate = 0;
            } else {
                $rate = $qRate->rate;
            }
        }
        
        return ($rate/100) * $tsi;
    }

    public function getZipcode(Request $request) {
        // Log::warning($request->all());
        $zips = EqZipcode::where('zipcode', 'like', '%' . $request->search . '%')
            ->select(['zipcode'])->distinct()->get();
        $rets = [];
        foreach ($zips as $zip) {
            $rets[] = ['label' => $zip->zipcode, 'value'=> $zip->zipcode];
        }
        return response()->json($rets);
    }

    public function calculator()
    {
        $data['types'] = EqConstructionType::all();
        $data['zipcodes'] = EqZipcode::take(100)->get();
        return view('frontend.calculators.calculator-id', $data);
    }

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
}
