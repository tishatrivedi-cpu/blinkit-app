@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile | Grocery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #4b96cf;
        }
        .profile-card {
            background:whitesmoke;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);       
            padding: 20px;
        }
        .profile-header {
            background: rgb(50, 50, 218)
            padding: 50px;
            border-radius: 10px 10px 0 0;
            color: black;
            text-align: center;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            margin-top: -60px;
        }
        /* .btn-save {
             background: rgb(50, 50, 218)
            color: white;
            background: #1e88e5;
        }
        .btn-save {
            
        } */
        .row{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card">
                <div class="profile-header">
                     {{-- <h3>Change Password</h3>  --}}
                </div>
                 <div class="text-center">
                    <img src="/assets/images/walmartlogo.png" alt="Profile Picture" class="profile-img">
                    <h3 class="mt-3">Change Password</h3>
                   
                </div>
                 <form class="p-3" action="/changepassword" method="POST">
                    @csrf
                     <div class="row">
                        <div class="col-8 ">
                            <label class="form-label">Old Password</label>
                            <input type="text" class="form-control" name="oldpass" placeholder="Enter old Password">
                            <span class="text-danger">
                            @error('oldpass')
                            {{$message}}
                        @enderror
                        </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 ">
                            <label class="form-label">New Password</label>
                            <input type="text" class="form-control" name="newpass" placeholder="Enter New Password">
                            <span class="text-danger">
                            @error('newpass')
                            {{$message}}
                        @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 ">
                            <label class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" name="conpass" placeholder="Enter New Password">
                             <span class="text-danger">
                            @error('conpass')
                            {{$message}}
                        @enderror
                             </span>
                        </div>
                    </div>
                     

                    

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 



@include('footer')