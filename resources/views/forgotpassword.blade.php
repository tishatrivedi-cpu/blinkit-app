<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Full-page background */
        body {
            font-family: Arial, sans-serif;
            /* margin-left:30%; */
            padding: 0;
        }

        .container-fluid {
            background-color: #f4f6f9;
        }

        /* Style for the blue side */
        .bg-primary {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        /* Style for the form card */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        h4.card-title {
            margin-bottom: 20px;
        }

        form .form-group {
            margin-bottom: 15px;
        }

        .btn-block {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100">
            <!-- Blue side -->
            <div class="col-md-6 bg-primary justify-content-center align-items-center text-white">
                <div class="text-center">
                    <h2>Welcome Back!</h2>
                    <p>We are happy to see you again.</p>
                </div>
            </div>
            <!-- Form side -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="card w-75 p-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Forgot Password ?</h4>
                        <center>
                            <p class="leas text-muted">you can set your new password here</p>
                        </center>
                        <form method="POST" action="/forgot_password">
                            @csrf
                            <div class="form-group">
                                <label for="email">Enter your Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Select Questions</label>
                                <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="sec_que">
                                    <option selected>Open this select menu to select question</option>
                                    <option value="What is Your Birthdate ?">What is Your Birthdate ?</option>
                                    <option value="How old you are ?">How old you are ?</option>
                                    <option value="What is Your nick name ?">What is Your nick name ?</option>
                                    <option value="which is Your Birth Place ? ">which is Your Birth Place ? </option>
                                    <option value="What is Your First School name ?">What is Your First School name ?
                                    </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <input type="answer" class="form-control" id="answer" name="answer"
                                    placeholder="answer">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                        </form>
                        <div class="text-center mt-3">
                            <p><a href="/">Back to Login</a></p>
                            <p><a href="/cp">change password ?</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>