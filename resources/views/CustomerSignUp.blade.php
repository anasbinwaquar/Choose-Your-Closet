<!DOCTYPE html>
<html>
<head>
  <title>Customer Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<body>
  <form action="Customer_registered" method="post">
        @csrf
         <div class="col-md-4 mb-3">
          <label for="FirstName" class="form_head myclass">First Name</label>
          <input type="text" class="form-control" id="FirstName" name="First_Name" placeholder="First Name" value="" required>
        </div>
         <div class="col-md-4 mb-3">
          <label for="LastName" class="form_head myclass">Last Name</label>
          <input type="text" class="form-control" id="LastName" name="Last_Name" placeholder="Last Name" value="" required>
        </div>
          <div class="col-md-4 mb-3">
          <label for="email" class="form_head">Email</label>
          <input type="email" class="form-control" id="Email" name="Email" placeholder="example@email.com">
        </div>
          <div class="col-md-4 mb-3">
          <label for="PhoneNumber" class="form_head myclass">Phone Number</label>
          <input type="text" class="form-control" id="PhoneNumber" name="Phone_Number" placeholder="Phone Number" value="" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="Userame" class="form_head myclass">Username</label>
          <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" value="" required>
        </div>
        <div class="col-md-4 mb-3">
        <label for="password" class="form_head">Password</label>
      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
        </div>

        <br>
      <button class="btn btn-primary" type="submit">Sign Up</button>

</form>
</body>
</html>