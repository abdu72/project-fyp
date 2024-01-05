<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    
  <div class="container animate__animated animate__slideInDown">
    <form action="/registeruser" class="login-form" method="post">
        @csrf
      <h2 class="form-title">Register</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
      </div>
      <div class="form-group">
        <label for="password">Confirmation Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn-login">Register</button>
    </form>
    
  </div>
</body>
</html>
