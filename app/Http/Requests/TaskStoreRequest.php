<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return 
            [
            'title' => 'required|min:5|max:100|string',
            ];
    }

    public function messages(){
        return
            [
                'title.required' => 'Введите имя для новой задачи',
                'title.min' => 'Имя слишком короткое',
                'title.max' => 'Имя слишком длинное',
            ];
    }
}
