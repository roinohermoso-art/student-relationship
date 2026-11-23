<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial; }
        body {
            background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1600');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar { 
          display: flex;
          justify-content: flex-end; 
          padding: 20px 40px; 
          background: rgba(0,0,0,0.3); 
        }

        .nav-links { 
          display: flex; 
          gap: 25px; 
          align-items: center; 
        }

        .nav-links a {   
          color: white; 
          text-decoration: none; 
          font-size: 14px; 
        } 

        .btn-login-nav { 
          border: 1px solid white; 
          padding: 7px 18px; 
          border-radius: 5px; 
          color: white; 
          text-decoration: none; 
        }

        .center { 
          flex: 1; 
          display: flex; 
          justify-content: center; 
          align-items: center; 
        }

        .box { 
          background: rgba(255,255,255,0.92); 
          width: 350px; 
          padding: 30px; 
          border-radius: 12px; 
          text-align: center; 
          position: relative; 
        }

        .box h2 { 
          margin-bottom: 15px;
         }

        .box label {
           display: block; 
           text-align: left; 
           font-size: 13px; 
           margin-top: 10px; 
          }

        .box input[type="email"], .box input[type="password"]
         {

            width: 100%; padding: 10px; margin: 5px 0;
            border: none; border-bottom: 1px solid #333;
            background: transparent; outline: none;
        }
        .row { 
          display: flex; 
          justify-content: space-between; 
          align-items: center; 
          margin-top: 12px; 
          font-size: 12px; 
        }
        .row label { 
          margin: 0; 
          display: flex; 
          align-items: center; 
          gap: 5px; 
        }
        .box button {
           width: 100%; 
           padding: 11px; 
           background: #1a2a3a; 
           color: white; 
           border: none; 
           border-radius: 5px; 
           cursor: pointer; 
           margin-top: 15px; 
          }

        .error { 
          background: #ffd2d2; 
          color: red; 
          padding: 8px; 
          border-radius: 5px; 
          font-size: 13px; 
          margin-bottom: 10px;
         }

        .link {
           margin-top: 12px;
          font-size: 13px; 
        }

        .close { 
          position: absolute; 
          top: 10px; 
          right: 15px; 
          cursor: pointer; 
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-links">
            <a href="/welcome">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <a href="/login" class="btn-login-nav">Login</a>
        </div>
    </div>

    <div class="center">
        <div class="box">
            <span class="close">X</span>
            <h2>Login</h2>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <div class="row">
                    <label><input type="checkbox" style="width:auto"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit">Login</button>
            </form>

            <div class="link">
                <a href="/register">Don't have an account? Register</a>
            </div>
        </div>
    </div>

</body>
</html>