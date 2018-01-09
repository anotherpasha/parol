<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.' . getDefaultLocale() => 'required',
            'publish_date' => 'required|date_format:d/m/Y',
        ];
    }

    public function messages()
    {
        return [
            'title.'.getDefaultLocale().'.required' => 'Title (' . getDefaultLocaleName() . ') is required.',
            'publish_date.required' => trans('validation.required', ['attribute' => 'Publish Date']),
            'publish_date.date_format' => trans('validation.date_format', ['attribute' => 'Publish Date', 'format' => 'd/m/Y']),
        ];
    }
}
