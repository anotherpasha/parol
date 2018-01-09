<?php

namespace App\Services;

use App\Models\Claim as ClaimModel;
use Illuminate\Http\Request;

class Claim
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
        return ClaimModel::all();
    }

    public function save(Request $request)
    {
        return ClaimModel::create([
            'policy_number' => $request->policy_number,
            'description' => $request->description
        ]);
    }
}
