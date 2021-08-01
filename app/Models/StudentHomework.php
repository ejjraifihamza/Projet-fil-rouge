<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomework extends Model
{
    use HasFactory;

    protected $table = 'student_homework'; 
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'file_path', 'student_id'];
}
