<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostIdeaRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required | max:20',
            'summary' => 'required | max:200',
            'price' => 'integer | required | max:1000000 ',
            'content' => 'required | max:5000',
        ];
    }
}
