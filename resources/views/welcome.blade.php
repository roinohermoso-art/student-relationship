<!DOCTYPE html>
<html>
<body>
<h1>Students Relationship</h1>
<a href="/add">+ Add Student</a> | <a href="/see">Gabriel</a>
<hr>
@foreach($students as $s)
<h3>{{$s->name}} - {{$s->email}}</h3>
<b>One to One - Profile:</b> {{$s->profile->address ?? ''}} | {{$s->profile->phone ?? ''}}<br>

<b>One to Many - Courses:</b>
@foreach($s->courses as $c)
{{$c->title}} ({{$c->grade}}),
@endforeach
<br>

<b>Many to Many - Subjects:</b>
@foreach($s->subjects as $sub)
{{$sub->name}},
@endforeach
<hr>
@endforeach
</body>
</html>