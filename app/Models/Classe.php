<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'id';

    protected $fillable = ['class_name'];

    public function classStudents() {
        return $this->hasMany(User::class);
    }

    public function classTeachers() {
        return $this->hasMany(Teacher::class);
    }

    public function classTeacherCours() {
        return $this->hasMany(TeacherCours::class);
    }

    public function classTeacherHomeworks() {
        return $this->hasMany(TeacherHomework::class);
    }

    public function classStudentHomeworks() {
        return $this->hasMany(StudentHomework::class);
    }
}
