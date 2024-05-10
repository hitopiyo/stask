<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //学生全件表示機能
    public function studentAll(){
        $student = Student();
        $result = $student -> getAll();
        return view('student_view',['student_result' => $result]);
    }
}
