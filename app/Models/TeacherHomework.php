<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherHomework extends Model
{
    use HasFactory;

    protected $table = 'teacher_homework'; 
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'deadline', 'file_path', 'teacher_id'];
}
