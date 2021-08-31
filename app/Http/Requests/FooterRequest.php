<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'email' => 'required|url',
            'youtube' => 'required|url',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'facebook.required'=>'يرجي ادخال لينك الفيس بوك!!',
            'twitter.required'=>'يرجي ادخال لينك التويتر!!',
            'email.required'=>'يرجي ادخال لينك الايميل!!',
            'youtube.required'=>'يرجي ادخال لينك اليوتيوب!!',
            'phone.required'=>'يرجي ادخال الهاتف!!',

            'facebook.url'=>'!! صيغة لينك الفيس غير صحيحة !!',
            'twitter.url'=>'!! صيغة لينك التويتر غير صحيحة !!',
            'email.url'=>'!! صيغة لينك الايميل غير صحيحة !!',
            'youtube.url'=>'!! صيغة لينك اليوتيوب غير صحيحة !!',

        ];
    }
}
