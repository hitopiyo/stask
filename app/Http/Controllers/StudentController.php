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
        //$student = Student::where('status',1)->get();
        //dd($student);
            //dd($request->search);
            $student = Student::where('status',1)->where('name', 'LIKE', "%{$request->search}%" )
            ->orWhere('grade', 'LIKE', "%{$request->search}%" )->paginate(50);
            //dd($student);

            //検索結果何件の表示
            $search_result = $request->search.'の検索結果'.count($student).'件';

            return view('index', [
                'students' => $student,
                'search_result' => $search_result,
                'search_query' => $request->search
            ]);
        //return view('index',compact('students'));        
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
        $students = Student::where('id',$id)->where('status',1)->get();
        $schoolgrade = SchoolGrade::where('student_id',$id)->get();   
        return view('show', compact('students','schoolgrade'));
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
        // 学生情報をidで取得
        $student = Student::find($id);
        $data = $request->all();
        
        //画像がアップロードされていれば、storageに保存
        if($request->hasFile('img_path')){
            $image = $request -> file('img_path');
            //dd($image);
            $file_name = $request->file('img_path')->getClientOriginalName();
            //dd($file_name);
            $request->file('img_path')->storeAs('/public' , $file_name);
            $student->img_path=$file_name;
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        //dd($path);
        // リクエストからModelの$fillableに設定したプロパティのみを抽出・保存
         //$student->fill($request->all())->save();
        $student ->update([
            'name' => $data['name'], 
            'address' => $data['address'],
            'grade' => $data['grade'], 
            'img_path' =>$path[1], 
            'comment' => $data['comment'],
            'status' => 1
        ]);

        // hhttp://localhost:8888/stask/public/edit/{id}にリダイレクト
        return redirect()->route('edit',['id'=>$student->id])->with('status','学生の更新が完了しました');;
    }
    
    public function creategrade($id)
    {
        //クリックしたstudentのid情報を渡す
        $student = Student::where('id',$id)->first();
        $select = Config::get('select.select_name');
        return view('graderegister',compact('student','select'));
    }
    public function addgrade(Request $request,$id)
    {

        //$grade = new SchoolGrade;
        //$grade->fill($request->all())->save();
        
        $datasecond = $request->all();
        //dd($datasecond);
        $student=Student::where('id',$id)->first();
        //dd($student);
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
        //dd($student);
        $schoolgrade = SchoolGrade::where('id',$iid)->first();
        //dd($schoolgrade);
        $select = Config::get('select.select_name');
        //dd($select);
        return view('gradeedit',['id'=> $iid ],compact('student','user','schoolgrade','select'));
    }

    public function updategrade(Request $request, $id)
    {
        $inputs = $request->all();
        //dd($inputs);
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
        //dd($inputs);
        //論理削除なので、statusを2に変更する
        Student::where('id',$id)->update([
            'status' => 2
        ]);
        //物理削除は下記書き方になる
        //SchoolGrade::where('id',$id)->delete;
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
