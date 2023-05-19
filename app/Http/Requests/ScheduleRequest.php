<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            // 'room_id' => 'required|integer|exists:App\Models\Room,id',
            'user_id' => 'nullable|integer|exists:App\Models\User,id',
            'title' => 'required|string|max:255',
            'type' => 'required|boolean',
            'meet_for' => 'required|integer',
        ];
    }
}
