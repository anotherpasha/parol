<?php

namespace App\Services;

use App\Models\Option as OptionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Option
{

    public function getOptions()
    {
        return OptionModel::all();
    }

    public function update(Request $request)
    {
        $datas = $request->except(['_token']);
        foreach ($datas as $key => $value) {
            OptionModel::where('key', $key)->update(['value' => $value]);
        }
    }
}
