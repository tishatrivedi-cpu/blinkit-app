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
            color: white;
            text-align: center;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            margin-top: -60px;
        }
        .btn-save {
             background: rgb(50, 50, 218)
            color: white;
        }
        .btn-save:hover {
            background: #1e88e5;
        }
    </style>
</head>
<body>

    @php
        $user=Session::get('user')
    @endphp

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card">
                <div class="profile-header">
                    {{-- <h3>Admin Profile</h3> --}}
                </div>
                <div class="text-center">
                    <img src="/assets/images/walmartlogo.png" alt="Profile Picture" class="profile-img">
                    <h5 class="mt-3">{{$user->username}}</h5>
                    <p>{{$user->role}}</p>
                </div>
                <form class="p-3" action="/profile" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="username" 
                            value="{{$user->username}}">
                            <span>
                              @error('username')
                            {{$message}}
                        @enderror
                        </span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            @error('email')
                            {{$message}}
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="mobileno" value="{{$user->mobileno}}">
                           @error('mobileno')
                            {{$message}}
                        @enderror
                        </div>
                       <div class="col-md-6">
                            <label class="form-label">Role</label>
                           <select class="form-select" name="role" disabled>
                                @if (strcmp($user->role,"Admin")==0)
                                <option value="Admin" selected>Admin</option>
                                @else
                                <option value="Admin" >Admin</option>
                                    
                                @endif

                                @if (strcmp($user->role,"SuperAdmin")==0)
                                <option value="SuperAdmin" selected>SuperAdmin</option>
                                @else
                                <option value="SuperAdmin" >SuperAdmin</option>
                                    
                                @endif

                                @if (strcmp($user->role,"Manager")==0)
                                <option value="Manager" selected>Manager</option>
                                @else
                                <option value="Manager" >Manager</option>
                                    
                                @endif

                            </select>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div> --}}
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-save px-4">Save Changes</button>
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