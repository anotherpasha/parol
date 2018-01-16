<?php

namespace App\Http\Controllers;

use App\Services\Registrant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrantsController extends Controller
{
    /**
     * @var registrant
     */
    private $registrant;

    /**
     * PermissionsController constructor.
     */
    public function __construct(Registrant $registrant)
    {
        $this->registrant = $registrant;
    }

    public function index()
    {
        $data['pageTitle'] = 'Leads';
        return view('admin.registrants.index', $data);
    }

    public function datatableList()
    {
        return $this->registrant->datatable();
    }

    public function download()
    {
        Excel::create('leads', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                // $sheet->fromArray($data);
                $sheet->fromModel($this->registrant->exported());
            });
        })->download('xls');
    }

}
