<?php

namespace App\Services;

use App\Models\Calculator as CalcModel;
use Illuminate\Http\Request;

class Calculator
{
    use DatatableParameters;

    public function datatable()
    {
        $data = $this->getList();

        return (new DatatableGenerator($data))
            ->generate();
    }

    public function getList()
    {
        return CalcModel::all();
    }

    public function exported()
    {
        return CalcModel::select('name', 'email', 'phone', 'date', 'time', 'building_status', 'zipcode', 'building_type', 'floor', 'construction_type', 'construction_class', 'package', 'building_value', 'content_value', 'flexa', 'rsmdcc', 'dlv', 'flood', 'earthquake')
            ->get();
    }
}
