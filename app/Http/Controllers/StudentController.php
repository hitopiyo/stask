<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolGrade;
use Illuminate\Support\Facades\Config;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
            $student = Student::where('status',1)->where('name', 'LIKE', "%{$request->search}%" )
            ->orWhere('grade', 'LIKE', "%{$request->search}%" )->paginate(50);
            $search_result = $request->search.'の検索結果'.count($student).'件';
            return view('index', [
                'students' => $student,
                'search_result' => $search_result,
                'search_query' => $request->search
            ]);
    
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
        $student_id = Student::insertGetId([
            'name' => $data['name'], 
            'address' => $data['address'],
            'grade' => 1,
            'img_path' =>1,
            'comment' => 1,
            'status' => 1
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
    try{
        $students = Student::where('id',$id)->where('status',1)->get();
        $schoolgrade = SchoolGrade::where('student_id',$id)->get();   
        return view('show', compact('students','schoolgrade'));
    }catch(Exception $e){
        echo "例外が発生しました";
    }
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

        $student = Student::find($id);
        $data = $request->all();
        

        if($request->hasFile('img_path')){
            $image = $request -> file('img_path');
            $file_name = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('/public' , $file_name);
            $student->img_path=$file_name;
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path = null;
        }

        $student ->update([
            'name' => $data['name'], 
            'address' => $data['address'],
            'grade' => $data['grade'], 
            'img_path' =>$path[1], 
            'comment' => $data['comment'],
            'status' => 1
        ]);
        return redirect()->route('edit',['id'=>$student->id])->with('status','学生の更新が完了しました');;
    }
    
    public function creategrade($id)
    {

        $student = Student::where('id',$id)->first();
        $select = Config::get('select.select_name');
        return view('graderegister',compact('student','select'));
    }
    public function addgrade(Request $request,$id)
    {

        
        $datasecond = $request->all();
        $student=Student::where('id',$id)->first();
        $grade=SchoolGrade::where('student_id',$student->id)->get();
        $schoolgrade_id = SchoolGrade::insertGetId([
            'student_id' =>$student['id'],
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
            'health_and_physical_education' => $datasecond['health_and_physical_education']
        ]);
        return redirect()->route('creategrade',['id'=>$student->id]);
    }

    public function gradeedit($iid)
    {
        $user = \Auth::user();
        $student = Student::where('id',$iid)->first();
        $schoolgrade = SchoolGrade::where('id',$iid)->first();
        $select = Config::get('select.select_name');
        return view('gradeedit',['id'=> $iid ],compact('student','user','schoolgrade','select'));
    }

    public function updategrade(Request $request, $id)
    {
        $inputs = $request->all();

        SchoolGrade::where('id',$id)->update([
            'grade' => $inputs['grade'],
            'term' => $inputs['term'],
            'japanese' => $inputs['japanese'],
            'math' => $inputs['math'],
            'science' => $inputs['science'], 
            'social_studies' => $inputs['social_studies'],
            'music' => $inputs['music'],
            'home_economics' => $inputs['home_economics'],
            'english' => $inputs['english'],
            'art' => $inputs['art'],
            'health_and_physical_education' => $inputs['health_and_physical_education']
        ]);
        return redirect()->route('gradeedit',['iid'=>$id]);
    }

    public function delete(Request $request, $id)
    {
        $inputs = $request->all();
        Student::where('id',$id)->update([
            'status' => 2
        ]);

        return redirect()->route('home')->with('success','学生の削除が完了しました');
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
