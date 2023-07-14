<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event.title' => 'required|string|max:50',
            'event.place' => 'required|string|max:50',
            'event.schedule' => 'required',
            'event.detail' => 'required|string|max:200',
        ];
    }
}
