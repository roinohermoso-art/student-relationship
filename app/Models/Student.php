<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email'];

    // ONE TO ONE - 1 student has 1 profile
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    // ONE TO MANY - 1 student has many courses
    public function courses() {
        return $this->hasMany(Course::class);
    }

    // MANY TO MANY - student has many subjects
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}