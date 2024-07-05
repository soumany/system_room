<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Login</title>
  <!-- Add your CSS here -->
</head>
<body>
  <div class="container">
    <h1>User Login</h1>
    <form action="{{ route('user.login.action') }}" method="POST">
      @csrf
      <div class="form-group">
        <input name="email" type="email" placeholder="Email Address" required>
      </div>
      <div class="form-group">
        <input name="password" type="password" placeholder="Password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('user.register') }}">Register here</a></p>
  </div>
</body>
</html>
