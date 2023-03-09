<?php 

namespace Src\Http\Controllers;

use Src\Core\Controllers\Contracts\ControllersAbstract;
use Src\Core\Http\Request;
use Src\Core\Http\Validation\Validator;
use Src\Http\Request\NewStudentRequest;
use Src\Models\Student;

class StudentsController extends ControllersAbstract {

    // index, create, store, edit, update, show, destroy
    public function index(){

        $users = Student::getInstance()->all();

        return view('users.index', compact('users'));
    }


    public function create() {
        return view('users.create');
    }

    public function store(){
        
        Validator::make(new NewStudentRequest());

        Student::getInstance()->create([
            'first_name' => Request::get('first_name', 'no name'),
            'last_name' => Request::get('last_name', 'no last name'),
            'national_code' => Request::get('national_code', 'no national code'),
            'student_number' => Request::get('student_number', 'no student number')
        ]);

        return redirect()->to('/students');
    }

}