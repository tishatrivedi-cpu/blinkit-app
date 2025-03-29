@include('header')


<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page">Users</li>
                
                
              </ol>
 </div>


<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

   <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="" class="btn btn-primary my-3 col-6 ">All Users</a>

</div>

<div class="table-responsive-lg">
    <table class="table table-white table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">index no</th>
                <th scope="col">Username</th>
                <th scope="col">UserProfile</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Status</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                
            
            <tr class="text-center">
                
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $item->username }}</td>
                {{-- <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBGcM6Pr04EvVjbkfVmNnXQoFHU_Y3NxbaNQ&s" height="80px" width="80px" alt="" style="border-radius: 50%"></td> --}}
                
                <td><img src="https://api.dicebear.com/9.x/avataaars/svg?seed={{$item->username}}" height="80px" width="80px" alt="" style="border-radius: 50%"></td>

                <td>{{ $item->email }}</td>
                <td>{{ $item->mobileno }}</td>
                

                   <td>
                        <a href="/status/{{$item->_id}}">
                        @if ($item->status)
                            <p class="btn btn-success">unblock</p>
                        @else
                            <p class="btn btn-danger">block</p>
                        @endif</a>
                    </td>



            </tr>
     

            @endforeach
        </tbody>
    </table>
    {{ $data->links()}}
</div>




@include('footer')