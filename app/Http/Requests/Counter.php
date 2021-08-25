<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Counter extends FormRequest
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
            'title' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ];
    }
    public function messages(){
        return [

            'title.required' =>'يرجي ادخال عنوان',
            'number.required' =>'يرجي ادخال رقم',
            'icon.required' =>'يرجي ادخال  ايقونه',
        ];
    }
}
