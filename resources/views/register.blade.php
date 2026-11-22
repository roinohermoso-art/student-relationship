<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
  body { font-family: Arial; background: #10b0fa; display: flex; justify-content: center; padding-top: 60px; }
  .box { background: white; width: 300px; padding: 25px; border-radius: 8px; border: 1px solid #e40b0b; }
  h2 { text-align: center; margin-top: 0; }
  input { width: 100%; padding: 10px; margin: 5px 0 12px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
  button { width: 100%; padding: 10px; background: #333; color: white; border: none; border-radius: 5px; cursor: pointer; }
  .error { color: red; font-size: 13px; text-align: center; margin-bottom: 10px; }
  .link { text-align: center; margin-top: 15px; font-size: 14px; }
</style>
</head>
<body>
<div class="box">
  <h2>Register</h2>
  @if($errors->any())
    <div class="error">{{ $errors->first() }}</div>
  @endif
  <form id="registerForm" method="POST" action="/register">
    @csrf
    Name<br><input type="text" name="name" value="{{ old('name') }}" required><br>
    Email<br><input type="email" name="email" value="{{ old('email') }}" required><br>
    Password<br><input type="password" name="password" required><br>
    Confirm Password<br><input type="password" name="password_confirmation" required><br>
    <button type="submit" id="registerBtn">Register</button>
  </form>
  <div class="link"><a href="/login">Login here</a></div>
</div>
<script>
document.getElementById('registerForm').addEventListener('submit', function(){
  let btn = document.getElementById('registerBtn');
  btn.disabled = true; btn.innerText = 'Registering...';
});
</script>
</body>
</html>




