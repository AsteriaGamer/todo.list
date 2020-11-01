<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubTaskUpdateRequest extends FormRequest
{
    public function rules(){
        return 
            [
            'title' => 'min:5|max:100|string',
            'start_time' => 'string|date_format:H:i',
            'end_time' => 'string|date_format:H:i',
            ];
    }

    public function messages(){
        return
            [
                'title.min' => 'Имя слишком короткое, минимальное число символов: 5',
                'title.max' => 'Имя слишком длинное, максимальное число символов: 100',
                'start_time.regex' => 'Введённый формат времени не соответствует hh:mm',
                'end_time.regex' => 'Введённый формат времени не соответствует hh:mm',

            ];
    }
}
