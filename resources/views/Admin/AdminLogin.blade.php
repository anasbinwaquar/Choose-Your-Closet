<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login-Admin Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/AdminStyle.css">
</head>
<body>

  <div class="body"></div>

  <form action="LoginAdminCheck" method="post">
        @csrf
        <div class="header">
      <div>Site<span>Project</span></div>
    </div>
    <br>
    <div class="login">
        <input type="text" placeholder="Username" name="Username"><br>
        <input type="password" placeholder="Password" name="Password"><br>
        <br>
        <!-- <input type="submit" value="Login"> -->
        <button type="button" class="btn btn-outline-primary">Primary</button>
        <!-- <button class="btn btn-primary" type="submit">Login</button> -->
    </div>
</form>
</body>
</html>


 
    