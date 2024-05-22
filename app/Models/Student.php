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
    public function leftAll(){
        $query = \DB::table('school_grade') -> leftjoin('students','studetns.id','=','school_grade.student_id') -> get();
        return $query;
    }
    // school_gradeテーブルとのリレーション設定
    public function school_grade(): BelongsTo
    {
        // 商品から見た場合は多対一になる
        return $this->belongsTo(school_grade::class);
    }
}
