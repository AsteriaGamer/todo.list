<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function rules(){
        return 
            [
            'title' => 'min:5|max:100|string',
            'confirmed' => 'boolean',
            'finish_date' => 'date',
            ];
    }
}
