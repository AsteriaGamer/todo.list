<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubTaskUpdateRequest extends FormRequest
{
    public function rules(){
        return 
            [
            'title' => 'min:5|max:100|string',
            'start_time' => 'sometimes|string|date_format:H:i|nullable',
            'end_time' => 'sometimes|string|date_format:H:i|nullable',
            ];
    }
}
