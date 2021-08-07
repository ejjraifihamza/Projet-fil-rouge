<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherHomework extends Model
{
    use HasFactory;

    protected $table = 'teacher_homework'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'class_name_id',
        'teacher_id',
        'subject',
        'name',
        'description',
        'deadline',
        'file_path'
    ];

    public function teacherHomeworkStudentHomeworks() {
        return $this->HasMany(StudentHomework::class);
    }

    public function classe() {
        return $this->belongsTo(Classe::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
