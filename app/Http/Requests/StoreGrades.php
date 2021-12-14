<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
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
            'Name_fr' => 'required|unique:grades,name->fr,' . $this->id,
            'Name_en' => 'required|unique:grades,name->en,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'Name_fr.required' => trans('validation.required'),
            'Name_fr.unique' => trans('validation.unique'),
            'Name_en.required' => trans('validation.required'),
            'Name_en.unique' => trans('validation.unique'),
        ];
    }
}
