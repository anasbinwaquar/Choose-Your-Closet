<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Seller Sign Up</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/SellerSignupStyle.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <img src="images/signup-bg.png" alt="" id="SellerBenefits">
            <div class="container">
                <div class="signup-content">
                    <form action="Seller_registered" method="post" autocomplete="off">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    @if($error=='The c n i c format is invalid.')
                                    <li>{{ "Please enter a valid CNIC number" }}</li>
                                    @else
                                        <li>{{ $error }}</li>
                                        
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            
                        <h2 class="form-title">Create account</h2>
                         <div class="form-group">
                            <input type="text" class="form-input" name="First_Name" required id="name" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Last_Name" required id="name" placeholder="Last Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="Email" required id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Phone_Number" required id="PhoneNumber" placeholder="Phone Number"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Website_Name"  id="WebsiteName" placeholder="Website Name(Optional)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Brand_Name" id="BrandName" placeholder="Brand Name(Optional)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Username"  required id="Username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" required id="Password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="CNIC" id="CNIC" required placeholder="CNIC : 42201-XXXXX-XX-X"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                       <!--  <div class="form-group"> -->
                          <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Sign up">Sign Up</button>
                            <!-- <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/> -->
                       <!--  </div> -->
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

 
</body>
</html>