<?php

namespace Src\Http\Request;

use Src\Core\Http\Validation\Contracts\FormRequest;

class NewStudentRequest implements FormRequest {

    public function rules()
    {
        return [
            'first_name' => ['required', 'max:10', 'min:3'],
            'last_name' => ['required', 'max:15', 'min:3', 'email'],
            'national_code' => ['required', 'unique:students,national_code', 'max:10'],
            'student_number' => ['required', 'unique:students,student_number', 'max:12']
        ];
    }

}