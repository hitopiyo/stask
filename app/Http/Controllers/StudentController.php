<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolGrade;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();

        return view('index',compact('students'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        return view('addstudent', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //return view('top');
        $student_id = Student::insertGetId([
            'name' => $data['name'], 
            'address' => $data['address'],
            'grade' => 1,
            'img_path' =>1,
            'comment' => 1
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::where('id',$id)->get();
        $grades = SchoolGrade::where('id',$id)->get();   
        return view('show', compact('students','grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user();
        $students = Student::where('id',$id)->first();
        return view('edit',['id'=> $id ],compact('students','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 商品データを1件取得
        $student = Student::find($id);

        // リクエストからModelの$fillableに設定したプロパティのみを抽出・保存
        $student->fill($request->all())->save();

        // http://localhost/item_manager/public/itemにリダイレクト
        return redirect("/show/{id}");
    }
    
    public function creategrade()
    {
        $user = \Auth::user();

        return view('graderegister',compact('user'));
    }
    public function addgrade(Request $request)
    {

        //$grade = new SchoolGrade;
        //$grade->fill($request->all())->save();
        
        $datasecond = $request->all();
        $student=Student::get();
        $grade=SchoolGrade::where('student_id',$id)->get();
        dd($grade);
        $schoolgrade_id = SchoolGrade::insertGetId([
            'student_id' =>1,
            'grade' => $datasecond['grade'],
            'term' => $datasecond['term'],
            'japanese' => $datasecond['japanese'],
            'math' => $datasecond['math'],
            'science' => $datasecond['science'],
            'social_studies' => $datasecond['social_studies'],
            'music' => $datasecond['music'],
            'home_economics' => $datasecond['home_economics'],
            'english' => $datasecond['english'],
            'art' => $datasecond['art'],
            'health_and_physical_education' => $datasecond['health_and_physical_education'],
        ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('top');
    }

    public function studentAll()
    {
        $student = Student::get();
        $result = $student -> getAll();
        return view('student_view',['student_result' => $result]);
    }
}
