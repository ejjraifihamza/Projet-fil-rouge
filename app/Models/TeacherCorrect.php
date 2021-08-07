<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCorrect extends Model
{
    use HasFactory;

    protected $table = 'teacher_corrects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'teacher_id',
        'user_id',
        'student_homework_id',
        'note',
        'notice'
    ];

    public function studentHomeworks() {
        return $this->belongsTo(StudentHomework::class);
    }
}
