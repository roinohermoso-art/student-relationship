<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <style>
            body{
                font-family:Arial;
                background:#ffe0f0;
                text-align:center;
                padding-top:100px
            }
            .box{
                background:white;
                width:400px;
                margin:auto;
                padding:30px;
                border-radius:15px
            }
            .btn{
                display:block;
                padding:12px;
                background:#ff33aa;
                color:white;
                text-decoration:none;
                border-radius:8px;
                margin:10px 0
            }
        </style>
    </head>
<body>
    <div class="box">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>log in</p>

        <a href="/students" class="btn">View System Output</a>
        <a href="/students/create" class="btn"> Add New Student</a>
        <form method="POST" action="/logout">
            @csrf
        <button class="btn" style="width:100%;border:none;cursor:pointer;background:#333">Logout</button>
      </form>
    </div>
</body>
</html>