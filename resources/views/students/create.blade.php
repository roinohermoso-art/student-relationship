<!DOCTYPE html>
<html>
    <head>
    <title>Add Student</title>
    <style>
        body {
            font-family:Arial;
            background:#ffe0f0;
            display:flex;
            justify-content:center;
            padding-top:30px}
            .box{background:white;
            width:400px;
            padding:25px;
            border-radius:10px}
            input{width:100%;padding:10px;
            margin:5px 0;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box
        }
        button{
            width:100%;
            padding:10px;
            background:#ff33aa;
            color:white;border:none;
            border-radius:5px;
            cursor:pointer;
            margin-top:10px
        }
</style>
</head>
<body>
    <div class="box">
    <h2 style="text-align:center">Add Student</h2>
    <form method="POST" action="/students">@csrf
    <label>Name</label>
    <input name="name" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Address</label>
    <input name="address" required>
    <label>Phone</label>
    <input name="phone" required>
    <label>Course Title</label>
    <input name="course_title" placeholder="BSIT" required>
    <label>Grade</label>
    <input name="grade" placeholder="1.5" required>
    <p>Subjects:</p>
    @foreach($subjects as $sub)
    <label>
    <input type="checkbox" name="subjects[]" value="{{ $sub->id }}" style="width:auto"> {{ $sub->name }}</label><br>
    @endforeach
    <button>Save Student</button>
    </form> 
    <p style="text-align:center"><a href="/students">View Output</a> | <a href="/welcome">Back to Welcome</a></p>
    </div>
</body>
</html>