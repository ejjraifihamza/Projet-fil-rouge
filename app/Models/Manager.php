<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use HasFactory;

    protected $table = 'managers';
    protected $primarykey = 'id';

    protected $fillable = ['name', 'email', 'password']; 
    protected $guarded = [];
}
