<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    protected $table = 'students';
    protected $fillable = [
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
