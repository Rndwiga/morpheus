<?php

namespace Tyondo\Aggregator\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * php artisan make:request AdminUserRequest
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
            'name' => 'required',
            'email' => 'required',
            'is_active' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ];
    }
}
