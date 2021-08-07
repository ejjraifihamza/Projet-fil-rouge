<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function teacherTeacherCours() {
        return $this->hasMany(TeacherCours::class);
    }

    public function teacherTeacherHomeworks() {
        return $this->hasMany(TeacherHomework::class);
    }

    public function classe() {
        return $this->belongsTo(Classe::class);
    }
}
