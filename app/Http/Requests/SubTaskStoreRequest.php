<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubTaskStoreRequest extends FormRequest
{
    public function rules(){
        return 
            [
            'title' => 'required|min:5|max:100|string',
            'confirmed' => 'boolean',
            'start_time' => 'sometimes|string|date_format:H:i|nullable',
            'end_time' => 'sometimes|string|date_format:H:i|nullable',
            'task_id' => 'required|integer|numeric',
            ];
    }
}
