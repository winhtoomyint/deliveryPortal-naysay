<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required|min:5|max:255',
            'image'=>'required',
            'logo'=>'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=>'Please enter delivery name!',
            'start_time.required'=>'Please enter start time name!',
            'end_time.required'=>'Please enter end time name!',
            'email.required'=>'Please enter email!',
            'phone.required'=>'Please enter phone!',
            'address.required'=>'Please enter address!',
            'image.required'=>'Please choose feature image!',
            'logo.required'=>'Please choose logo!',
        ];
    }
}
