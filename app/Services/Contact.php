<?php

namespace App\Services;

use App\Models\Contact as ContactModel;
use Illuminate\Http\Request;

class Contact
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
        return ContactModel::all();
    }

    public function exported()
    {
        return ContactModel::select('name', 'email', 'phone', 'date', 'time', 'message')
            ->get();
    }
}
