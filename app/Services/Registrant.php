<?php

namespace App\Services;

use App\Models\Registrant as RegistrantModel;

class Registrant
{
    use DatatableParameters;

    protected $baseUrl = 'permissions';

    public function datatable()
    {
        $data = $this->getList();

        return (new DatatableGenerator($data))
            ->generate();
    }

    public function getList()
    {
        return RegistrantModel::all();
    }

    public function exported()
    {
        return RegistrantModel::select('name', 'email', 'phone', 'occupation', 'date', 'time', 'product', 'message')
            ->get();
    }
}
