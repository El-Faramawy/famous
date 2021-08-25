<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlider extends FormRequest
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
            'image' => 'required_without:num|mimes:jpeg,jpg,png',
            'slider_title' => 'required',
            'slider_content' => 'required',
            'slider_btn' => 'required',
            'slider_btn_link' => 'required',
        ];
    }
    public function messages(){
        return [
            'image.required_without' =>'يرجي رفع الصوره',
            'image.mimes' =>'صيغه الصوره غير مدعومة',
            'slider_title.required' =>'يرجي ادخال عنوان',
            'slider_content.required' =>'يرجي ادخال وصف',
            'slider_btn.required' =>'يرجي ادخال اسم الزر',
            'slider_btn_link.required' =>'يرجي ادخال لينك الزر',
        ];
    }
}
