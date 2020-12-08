<?php

namespace App\Http\Requests\RoomType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomType extends FormRequest
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
            'room_type' =>'required',
            'title' => 'required',
            'status' => 'required',
            'feature_image' => 'mimes:png,jpg,gif,webp,JPG,jpeg,JPEG,PNG',
            'base_price' => 'required|min:0',
            'max_occupancy' => 'required|min:1',
            'no_of_adult' => 'required|min:1',
            'no_of_child' => 'min:0'
        ];
    }
}
