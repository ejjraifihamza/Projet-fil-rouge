<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCours extends Model
{
    use HasFactory;

    protected $table = 'teacher_cours';

    protected $primaryKey = 'id';

    protected $fillable = [
        'teacher_id',
        'class_name_id',
        'subject',
        'name',
        'description',
        'file_path'
    ];
}
