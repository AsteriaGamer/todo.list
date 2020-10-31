<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskMemberStoreRequest extends FormRequest
{
    public function rules(){
        return 
            [
            'task_id' => 'required|integer|numeric',
            'user_name' => 'required|exists:users,name',
            ];
    }

    public function messages(){
        return
            [
                'user_name.require' => 'Введите имя пользователя',
                'user_name.exists' => 'Пользователя с таким именем не существует',
            ];
    }

}
