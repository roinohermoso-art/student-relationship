<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;

Route::get('/', function () {
    $students = Student::with(['profile','courses','subjects'])->get();
    $subjects = Subject::all();
    return view('welcome', compact('students','subjects'));
});

Route::get('/add', function(){
    $subjects = Subject::all();
    return view('add', compact('subjects'));
});

Route::post('/save', function(Request $request){
    $s = Student::create(['name'=>$request->name,'email'=>$request->email]);
    $s->profile()->create(['address'=>$request->address,'phone'=>$request->phone]);
    $s->courses()->create(['title'=>$request->course_title,'grade'=>$request->grade]);
    $s->subjects()->attach($request->subjects);
    return redirect('/');
});

Route::get('/see', function(){
    $gab = Student::create(['name'=>'Gabriel','email'=>'gab@gmail.com']);
    $gab->profile()->create(['address'=>'Suba Danao City','phone'=>'09266127864']);
    $gab->courses()->create(['title'=>'BSIT','grade'=>'1.5']);
    $gab->courses()->create(['title'=>'BSIS','grade'=>'1.0']);
    $gab->courses()->create(['title'=>'BSBA','grade'=>'1.2']);
    $gab->subjects()->attach(
        Subject::whereIn('name',['Math','Soc-Sci','ITM'])->pluck('id')
    );
    return "<a href='/'>See to Gabriel</a>";
});