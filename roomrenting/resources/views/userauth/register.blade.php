<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Register</title>
  <!-- Add your CSS here -->
</head>
<body>
  <div class="container">
    <h1>Create a User Account</h1>
    <form action="{{ route('user.register.save') }}" method="POST">
      @csrf
      <div class="form-group">
        <input name="name" type="text" placeholder="Name" required>
      </div>
      <div class="form-group">
        <input name="email" type="email" placeholder="Email Address" required>
      </div>
      <div class="form-group">
        <input name="password" type="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
      </div>
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a></p>
  </div>
</body>
</html>
