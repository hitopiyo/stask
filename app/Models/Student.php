<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'adress',
        'grade'
    ];
    
}
