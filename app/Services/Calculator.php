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
}
