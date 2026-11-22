<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
  body { font-family: Arial; background: #f2f2f2; display: flex; justify-content: center; padding-top: 80px; }
  .box { background: white; width: 300px; padding: 25px; border-radius: 8px; border: 1px solid #ddd; }
  h2 { text-align: center; margin-top: 0; }
  input { width: 100%; padding: 10px; margin: 5px 0 15px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
  button { width: 100%; padding: 10px; background: #333; color: white; border: none; border-radius: 5px; cursor: pointer; }
  button:disabled { background: #999; }
  .error { color: red; font-size: 13px; text-align: center; margin-bottom: 10px; }
  .link { text-align: center; margin-top: 15px; font-size: 14px; }
</style>
</head>
<body>

<div class="box">
  <h2>Login</h2>

  @if($errors->any())
    <div class="error">{{ $errors->first('email') }}</div>
  @endif

  <form id="loginForm" method="POST" action="/login">
    @csrf
    Email<br>
    <input type="email" name="email" value="{{ old('email') }}" required><br>
    Password<br>
    <input type="password" name="password" required><br>
    <button type="submit" id="loginBtn">Login</button>
  </form>

  <div class="link"><a href="/register">Register here</a></div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(){
  let btn = document.getElementById('loginBtn');
  btn.disabled = true;
  btn.innerText = 'Logging in...';
});
</script>

</body>
</html>