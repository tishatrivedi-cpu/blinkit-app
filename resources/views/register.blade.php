<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from www.bootstrapget.com/demos/unity-bootstrap-admin-dashboard/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Dec 2024 06:18:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Templates - Dashboard Templates - Unify Admin Template</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta name="author" content="Bootstrap Gallery">
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="/assets/images/favicon.svg">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="/assets/fonts/bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/main.min.css">
  </head>

  <body class="login-bg">
    <!-- Container start -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
        <form action="/register_admin" class="my-5" method="POST" >
    @csrf
    <div class="login-form rounded-4 p-4 mt-5">

        <img src="/assets/images/walmartlogo.png" alt="walmartlogo" class="logo-img"
                            style="width:90px; height: 90px; border-radius: 50%; border: 4px solid white; margin-left:35%">

        <h2 class="fw-600 mb-4 text-bold">SignUp</h2>

        <div class="mb-3">
            <label class="form-label" for="username">Your UserName</label>
            <input type="text" id="username" class="form-control border-0" placeholder="Enter your UserName" name="username">
            <span class="text-danger">@error('username') {{$message}} @enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pwd">Your Password</label>
            <input type="password" id="password" class="form-control border-0" placeholder="Enter password" name="password">
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Your Email</label>
            <input type="email" id="email" class="form-control border-0" placeholder="Enter your email" name="email">
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="mobileno">Your MobileNo</label>
            <input type="text" id="mobileno" class="form-control border-0" placeholder="Enter your MobileNo" name="mobileno">
            <span class="text-danger">@error('mobileno') {{$message}} @enderror</span> 
        </div>
        <div class="mb-3">
            <label class="form-label" for="role">Select Your Role</label>
            <select name="role" id="role" class="form-select">
                <option value="Admin">Admin</option>
                <option value="SuperAdmin">SuperAdmin</option>
                <option value="Manager">Manager</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sec_que">Select Questions</label>
            <select class="form-select form-select-md mb-3" name="sec_que">
                <option selected>Open this select menu to select question</option>
                <option value="What is Your Birthdate ?">What is Your Birthdate ?</option>
                <option value="How old you are ?">How old you are ?</option>
                <option value="What is Your nick name ?">What is Your nick name ?</option>
                <option value="Which is Your Birth Place ?">Which is Your Birth Place ?</option>
                <option value="What is Your First School name ?">What is Your First School name ?</option>
            </select>
        </div>

        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" class="form-control" id="answer" name="answer" placeholder="answer">
            <span class="text-danger">@error('answer') {{$message}} @enderror</span>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check m-0">
                <input class="form-check-input border-0" type="checkbox" value="" id="termsConditions">
                <label class="form-check-label" for="termsConditions">I agree to the terms and conditions</label>
            </div>
        </div>
        <div class="d-grid py-3 mt-3">
            <button type="submit" class="btn btn-lg btn-primary" >
                Signup
            </button>
        </div>

         <div class="text-center py-3">or Signup with</div>
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="submit" class="btn btn-outline-light">
                                <i class="bi bi-google me-2"></i>Gmail
                            </button>
                            <button type="submit" class="btn btn-outline-light">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </button>
                        </div>

         <div class="text-center pt-4">
                            <span>Already Have An Account?</span>
                            <a href="/" class="text-white text-decoration-underline ms-2">
                                Login</a>
                        </div>
    </div>
</form>

        </div>
      </div>
    </div>
    <!-- Container end -->
  </body>


<!-- Mirrored from www.bootstrapget.com/demos/unity-bootstrap-admin-dashboard/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Dec 2024 06:18:16 GMT -->
</html>