@include('header')

<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page">Pincode</li>
              </ol>
 </div>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

   <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >
        <a href="{{ route('pincode.create') }}" class="btn btn-primary my-3 col-6 ">Add Pincode<i class="fa-solid fa-plus"></i></a>

</div>

<div class="table-responsive-lg">
    <table class="table table-white table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">index no</th>
                <th scope="col">Pincode</th>
                <th scope="col">Locality</th>
                <th scope="col">oprations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                
            
            <tr class="text-center">
                
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $item->pincode }}</td>
                <td>{{ $item->locality }}</td>

                {{-- <td><img src="{{ $item->cat_pic }}" height="100" width="100" alt="/img/no_img.jpg"> --}}




                 <td><a href="{{route('pincode.edit', $item->_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <form action="{{ route('pincode.destroy', $item->_id)}}" class="d-inline" onsubmit="confirmDelete(event)"
                    method="POST">
                @csrf
                @method('delete')    
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </tr>

           

           

            @endforeach
        </tbody>
    </table>
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