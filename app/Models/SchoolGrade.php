<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    protected $table = 'school_grades';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_id',
        'grade',
        'term',
        'japanese',
        'math',
        'science',
        'social_studies',
        'music',
        'home_economics',
        'english',
        'art',
        'health_and_physical_education'
    ];

    // studentテーブルとのリレーション設定
    public function students(): HasMany
    {
        // カテゴリから見た場合は一対多になる
        return $this->hasMany(Student::class);
    }
}
