<?php

namespace App\Http\Requests;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Foundation\Http\FormRequest;

class CreateBooking extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Sentinel::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'country' => 'required',
            'email' => 'required',
            'guests' => 'required',
            'room_price' => '',
            'address' => '',
            'city' => '',
            'post_code' => '',
            'phone' => '',
            'message' => '',
        ];
    }

    public function messages()
    {
        return [
            'selectedCheckIn.required' => 'Invalid check-in date',
            'selectedCheckIn.date' => 'Invalid check-in date',
            'selectedCheckOut.date' => 'Invalid check-out date',
            'selectedCheckOut.required' => 'Invalid check-out date',
            'guests.required' => 'Invalid guests number',
        ];
    }
}
