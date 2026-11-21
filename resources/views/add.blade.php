<!DOCTYPE html>
<html>
<body>
<h2>Add Student</h2>
<form method="POST" action="/save">
@csrf
Name: <input name="name" required><br><br>
Email: <input name="email" required><br><br>
Address: <input name="address"><br><br>
Phone: <input name="phone"><br><br>
Course Title: <input name="course_title" value="BSIT"><br><br>
Grade: <input name="grade" value="1.5"><br><br>

Subjects:<br>
@foreach($subjects as $sub)
<input type="checkbox" name="subjects[]" value="{{$sub->id}}"> {{$sub->name}}<br>
@endforeach
<br>
<button type="submit">Save</button>
</form>
<a href="/">Return</a>
</body>
</html>