<?php

namespace Src\Models;

use Src\Core\Model\Model;

class Student extends Model {

    protected string $table = 'students';

    protected array $fillable = [
        'first_name',
        'last_name',
        'national_code',
        'student_number'
    ];

}