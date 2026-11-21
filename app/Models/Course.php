<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['student_id', 'title', 'grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}