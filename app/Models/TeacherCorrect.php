<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCorrect extends Model
{
    use HasFactory;

    protected $table = 'teacher_correct';
    protected $primaryKey = 'id';

    protected $fillable = [
        'teacher_id',
        'student_homework_id',
        'note',
        'notice'
    ];
}
