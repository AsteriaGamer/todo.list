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
            'start_time' => 'string|date_format:H:i',
            'end_time' => 'string|date_format:H:i',
            'task_id' => 'required|integer|numeric',
            ];
    }

    public function messages(){
        return
            [
                'title.required' => 'Введите имя для новой задачи',
                'title.min' => 'Имя слишком короткое, минимальное число символов: 5',
                'title.max' => 'Имя слишком длинное, максимальное число символов: 100',
                'confirmed.boolean' => 'Подтверждение выполнения, несоответствие типов',
                'task_id.exists' => 'Указанной задачи не существует',
                'start_time.regex' => 'Введённый формат времени не соответствует hh:mm',
                'end_time.regex' => 'Введённый формат времени не соответствует hh:mm',

            ];
    }
}
