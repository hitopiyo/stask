<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\school_grade;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'address',
        'grade',
        'img_path',
        'comment'
    ];

    public function StoreStudent(){
        try{
            $student->name =$request->input('name');
            $student->address=$request->input('address');
            $student->grade=1;
            $student->img_path=1;
            $student->comment=1;
            $student->save();

        }catch(\Exception $e){
                return redirect()->route('create')->with('alart','登録に失敗しました');
        }
    }

    

    // school_gradeテーブルとのリレーション設定
    public function school_grade(): BelongsTo
    {
        // 商品から見た場合は多対一になる
        return $this->belongsTo(school_grade::class);
    }
}
