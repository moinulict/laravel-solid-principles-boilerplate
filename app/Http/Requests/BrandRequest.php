<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    "name"              => 'string|required|max:80|unique:brands,name',
                    "description"       => "string|nullable",
                    "sort"              => "integer|nullable",
                    "url"               => "string|max:255|nullable",
                    "feature_status"    => "integer|between:0,1",
                    "image"             => "mimes:jpeg,jpg,png",
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    "name"              => "string|required|max:80|unique:brands,name,{$this->brand->id}",
                    "description"       => "string|nullable",
                    "sort"              => "integer|nullable",
                    "url"               => "string|max:255|nullable",
                    "feature_status"    => "integer|between:0,1",
                    "image"             => "mimes:jpeg,jpg,png",
                ];
                break;
        }
    }
}
