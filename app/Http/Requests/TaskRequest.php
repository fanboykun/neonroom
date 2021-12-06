<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'explanation' => 'required|string|max:255',
            'is_attachable' => 'required|boolean',
            'schedule_id' => 'required|exists:App\Models\Schedule,id',
            'due_time' => 'reuqired|date_format:Y-m-d H:i:s',
        ];
    }
}
