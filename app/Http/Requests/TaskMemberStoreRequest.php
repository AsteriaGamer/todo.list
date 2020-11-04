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

}
