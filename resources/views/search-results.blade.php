@include('header')

    <div class="container">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

        <div class="row">
            <div class="col-12">

                <a href="/home" class=" btn btn-dark"><i class="fas fa-backward mr-2 text-lg"></i>BACK</a>

                {{-- '<a class="btn btn-warning" href="/product">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>' --}}

                <div class="card mt-3">
                    <table class="table" id="table1">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">product pic</th>
                            <th scope="col">product name</th>
                            <th scope="col">product Description</th>
                            <th scope="col">product Discount</th>
                            <th scope="col">SubCategories</th>
                            <th scope="col">product Price</th>
                            <th scope="col">product unit</th>
                            <th scope="col" class="">Show Full Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                           <td>{{$loop->index+1}}</td>
                            <td><img src="{{$item->pro_pic1}}" height="120px" width="150px" alt=""></td>
                           <td>{{$item->pname}}</td>
                           <td>{{$item->pro_desc}}</td>
                           <td>{{$item->pro_disc}}</td>
                           <td>{{$item->subcategory}}</td>
                           <td>{{$item->pro_price}}</td>
                           <td>{{$item->pro_unit}}</td>
                            
                              {{-- <a href="{{ route('product.edit',$item->id) }}" class="btn btn-warning mr-5">Edit</a> --}}

                               
                           

                            
                            
                           <td>
                            <a href="{{route('product.show',$item->_id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                           </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($msg = Session::get('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ $msg }}',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
    @endif

    
    @include('footer')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@if (Session::get('success'))
<script>
Swal.fire({
    icon: "success",
    title: "{{Session::get('success')}}",
    showConfirmButton: false,
    timer: 2500
});
</script>
@endif

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
                event.target.submit(); // Submit the form after confirmation
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        if ($('#table1').length) {
            $('#table1').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        }
    });
</script>
