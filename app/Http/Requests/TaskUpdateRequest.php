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

    public function messages(){
        return
            [
                'title.min' => 'Имя слишком короткое, минимальное число символов: 5',
                'title.max' => 'Имя слишком длинное, максимальное число символов: 100',
                'confirmed.boolean' => 'Подтверждение выполнения, несоответствие типов',
                'finish_date' => 'Дата выполнения задачи не является типом date',
            ];
    }
}
