<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapget.com/demos/unity-bootstrap-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Dec 2024 06:17:58 GMT -->

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
                <form action="/login" class="my-5" method="POST">
                    @csrf
                    <div class="login-form rounded-4 p-4 mt-5 ">

                        <img src="/assets/images/walmartlogo.png" alt="walmartlogo" class="logo-img"
                            style="width:90px; height: 90px; border-radius: 50%; border: 4px solid white; margin-left:35%">
                        </a>
                        <h2 class="fw-600 mb-4">Login</h2>
                        <div class="mb-3">
                            <label class="form-label" for="yEmail">Your Username</label>
                            <input type="text" id="username" name="username" class="form-control border-0"
                                placeholder="Enter your Username">
                            <span class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pwd">Your Password</label>
                            <input type="password" id="pwd" name="password" class="form-control border-0"
                                placeholder="Enter password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        @if ($errors->has('login_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('login_error') }}
                            </div>
                        @endif

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check m-0">
                                <input class="form-check-input border-0" type="checkbox" value=""
                                    id="rememberPassword">
                                <label class="form-check-label" for="rememberPassword">Remember</label>
                            </div>
                            <a href="/forgotpassword" class="text-white text-decoration-underline">Lost password?</a>
                        </div>
                        <div class="d-grid py-3 mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="text-center py-3">or Login with</div>
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="submit" class="btn btn-outline-light">
                                <i class="bi bi-google me-2"></i>Gmail
                            </button>
                            <button type="submit" class="btn btn-outline-light">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </button>
                        </div>
                        <div class="text-center pt-4">
                            <span>Not registered?</span>
                            <a href="/register" class="text-white text-decoration-underline ms-2">
                                SignUp</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container end -->
</body>


<!-- Mirrored from www.bootstrapget.com/demos/unity-bootstrap-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Dec 2024 06:17:58 GMT -->

</html>
