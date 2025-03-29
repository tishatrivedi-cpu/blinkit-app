@include('header')

<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page">Store</li>
              </ol>
 </div>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

   <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="{{ route('store.create') }}" class="btn btn-primary my-3 col-6 ">Add Store<i class="fa-solid fa-plus"></i></a>

</div>

<div class="table-responsive-lg">
    <table class="table table-white table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">index no</th>
                <th scope="col">Store_name</th>
                <th scope="col">Store_pic</th>
                <th scope="col">Store_Addres</th>
                <th scope="col">pincode</th>
                <th scope="col">mobileno</th>

                <th scope="col" colspan="2">oprations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                
            
            <tr class="text-center">
                
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $item->s_name }}</td>
                <td><img src="{{ $item->s_pic }}" height="100" width="100" alt="/img/no_img.jpg">
                <td>{{ $item->s_addres }}</td>
                <td>{{ $item->pincode }}</td>
                 <td>{{ $item->mobileno }}</td>
                 <td><a href="{{route('store.edit', $item->_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <form action="{{ route('store.destroy', $item->_id)}}" class="d-inline" onsubmit="confirmDelete(event)"
                    method="POST">
                @csrf
                @method('delete')    
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </tr>

           

           

            @endforeach
        </tbody>
    </table>
    {{ $data->links()}}
</div>

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js
"></script>


<script>
function confirmDelete(event) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();  // Submit the form after confirmation
        }
});
}
</script>


@include('footer')