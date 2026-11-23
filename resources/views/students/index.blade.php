<!DOCTYPE html>
<html><head><title>System Output</title>
<style>
    .body{font-family:Arial;
    background:#fff0f7;
    padding:20px}
    .card{background:white;
    padding:15px; 
    margin:10px 0;
    border-radius:10px;
    border:1px solid #ddd}
    h2{color:#ff33aa}
</style>
</head>
<body>
    <h2>System Output - Students Relationship</h2>
    <a href="/welcome">Back to Welcome</a> | <a href="/students/create">Add Student</a><br><br>

    @foreach($students as $s)
    <div class="card">
    <h3>{{ $s->name }} - {{ $s->email }}</h3>

    <p><b>One to One - Profile:</b><br>
    @if($s->profile)
    Address: {{ $s->profile->address }} <br>
    Phone: {{ $s->profile->phone }}
    @else No profile @endif
    </p>

    <p><b>One to Many - Courses:</b></p>
    <ul>
    @foreach($s->courses as $c)
    <li>{{ $c->title }} - Grade: {{ $c->grade }}</li>
    @endforeach
    </ul>

    <p><b>Many to Many - Subjects:</b></p>
    <ul>
    @foreach($s->subjects as $sub)
    <li>{{ $sub->name }}</li>
    @endforeach
    </ul>
    </div>
    @endforeach

    @if($students->isEmpty())
    <p><a href="/students/create">Add Student</a></p>
    @endif
</body>
</html>