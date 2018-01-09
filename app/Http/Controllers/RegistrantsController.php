<?php

namespace App\Http\Controllers;

use App\Services\Registrant;
use Illuminate\Http\Request;

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
        $data['pageTitle'] = 'Registrant';
        return view('admin.registrants.index', $data);
    }

    public function datatableList()
    {
        return $this->registrant->datatable();
    }

}
