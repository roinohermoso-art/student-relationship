<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    // MANY TO MANY - subject has many students
    public function students() {
        return $this->belongsToMany(Student::class);
    }
}
