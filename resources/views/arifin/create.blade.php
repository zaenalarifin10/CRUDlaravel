<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="{{route('post.store')}}" method="POST">
        @csrf
      <div class="input-field">
        <input type="text" name="name"  class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="input-field">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
      </div>

      <div class="input-field">
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter your email" required>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit">Register</button>

      <!-- Register link -->
      <div class="register">
        <p>Don't have an account? <a href="{{ route('login') }}">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
