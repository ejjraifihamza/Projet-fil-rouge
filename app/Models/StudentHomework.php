<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomework extends Model
{
    use HasFactory;

    protected $table = 'student_homework'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'teacher_homework_id',
        'class_name_id',
        'subject',
        'name',
        'file_path'
    ];
}
