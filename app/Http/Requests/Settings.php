<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Settings extends FormRequest
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
            'website_name' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'description' => ['required'],
            'website_email' => ['required'],
            'writers_contact_email' => ['required'],
            'website_phone' => ['required'],
        ];
    }
}
