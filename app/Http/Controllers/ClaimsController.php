<?php

namespace App\Http\Controllers;

use App\Services\Claim;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{
    /**
     * @var claim
     */
    private $claim;

    /**
     * PermissionsController constructor.
     */
    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    public function index()
    {
        $data['pageTitle'] = 'Claim';
        return view('admin.claims.index', $data);
    }

    public function datatableList()
    {
        return $this->claim->datatable();
    }

}
