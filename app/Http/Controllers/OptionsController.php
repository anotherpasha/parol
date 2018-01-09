<?php

namespace App\Http\Controllers;

use App\Services\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    protected $option;

    public function __construct(Option $option)
    {
        $this->option = $option;
    }

    public function detail()
    {
        $datas = $this->option->getOptions();
        $options = [];
        foreach ($datas as $option) {
            $options[$option->key] = $option->value;
        }
        $options['pageTitle'] = 'Options';
        return view('admin.miscs.detail', $options);
    }

    public function edit()
    {
        $datas = $this->option->getOptions();
        $options = [];
        foreach ($datas as $option) {
            $options[$option->key] = $option->value;
        }
        $options['pageTitle'] = 'Edit Options';
        return view('admin.miscs.edit', $options);
    }

    public function update(Request $request)
    {
        $this->option->update($request);
        return backendRedirect('options');
    }
}
