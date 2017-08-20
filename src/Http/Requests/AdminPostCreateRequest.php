<?php

namespace Tyondo\Aggregator\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostCreateRequest extends FormRequest
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
            'photo_id' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ];
    }
}
