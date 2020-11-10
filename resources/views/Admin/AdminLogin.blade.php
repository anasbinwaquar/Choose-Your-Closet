<!DOCTYPE html>
<html>
<head>
  <title>Login-Admin Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<body>
  <form action="LoginAdminCheck" method="post">
        @csrf
        <div class="col-md-4 mb-3">
          <label for="Name" class="form_head myclass">Username</label>
          <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" value="" required>
        </div>
        <div class="col-md-4 mb-3">
        <label for="password" class="form_head">Password</label>
      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
        </div>
        <br>
      <button class="btn btn-primary" type="submit">Login</button>
</form>
</body>
</html>