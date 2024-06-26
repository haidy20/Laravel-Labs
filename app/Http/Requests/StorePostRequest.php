<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StorePostRequest extends FormRequest
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
            "title"=>["required","unique:posts","min:3"],
            "body"=>"required|min:10"        
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
