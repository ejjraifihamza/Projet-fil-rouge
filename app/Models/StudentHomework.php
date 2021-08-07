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

    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    public function teacherHomework() {
        return $this->belongsTo(TeacherHomework::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function teacherCorrect() {
        return $this->hasOne(TeacherCorrect::class);
    }
}
