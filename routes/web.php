<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;


Route::get('/', function() {
    return redirect('/login');
});


Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', function(Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/welcome');
    }
    return back()->withErrors(['email' => 'Invalid Email or Password.  Please try again.']);
});

Route::get('/register', function() {
    return view('auth.register');
});

Route::post('/register', function(Request $request) {
    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    Auth::login($user);
    return redirect('/welcome');
});


Route::middleware('auth')->group(function () {

    
    Route::get('/welcome', function() {
        return view('welcome');
    });

  
    Route::get('/students', function() {
        $students = Student::with(['profile','courses','subjects'])->get();
        $subjects = Subject::all();
        return view('students.index', compact('students','subjects'));
    });

    Route::get('/students/create', function() {
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    });

  
    Route::post('/students', function(Request $request) {
        $s = Student::create(['name'=>$request->name, 'email'=>$request->email]);
        $s->profile()->create(['address'=>$request->address, 'phone'=>$request->phone]);
        $s->courses()->create(['title'=>$request->course_title, 'grade'=>$request->grade]);
        $s->subjects()->attach($request->subjects);
        return redirect('/students');
    });

    Route::post('/logout', function(Request $request) {
        Auth::logout();
        return redirect('/login');
    });
});

Route::get('/see', function() {
    $gab = Student::create(['name'=>'Gabriel', 'email'=>'gab@gmail.com']);
    $gab->profile()->create(['address'=>'Suba Danao City', 'phone'=>'09266127864']);
    $gab->courses()->create(['title'=>'BSIT', 'grade'=>'1.5']);
    $gab->courses()->create(['title'=>'BSIS', 'grade'=>'1.0']);
    $gab->courses()->create(['title'=>'BSBA', 'grade'=>'1.2']);
    $gab->subjects()->attach(
        Subject::whereIn('name', ['Math','Soc-Sci','ITM'])->pluck('id')
    );
    return "<a href='/'>See to Gabriel</a>";
});