@include('header')

<style>
    .search {
        border: 2px solid #097677;
        background-color: white;
        color: #097677;
        border-radius: 10px;

    }

    .search:hover {
        border: 1px solid #097677;
        background-color: #097677;
        color: white;
        border-radius: 10px;
        transition: 0.6s;
        

    }
</style>

<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page">Product</li>
              </ol>
 </div>


 

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">


    <div class="row justify-content-center">
    <div class="col-md-8">
        <form action="/search_product" method="GET" class="d-flex">
            <input type="search" name="search" class="form-control" placeholder="Search category wise products here">
            <button type="submit" class="btn search ms-2">Search</button>
        </form>
        @error('search')
            <p class="lead text-danger">*Please search category</p>
        @enderror
    </div>
</div>

<style>
    .search {
        border: 2px solid #097677;
        background-color: white;
        color: #097677;
        border-radius: 10px;
        padding: 5px 15px; /* Adds some padding */
    }

    .search:hover {
        background-color: #097677;
        color: white;
        transition: 0.3s;
    }
</style>


   <div class="container m-2" style="display: flex; justify-content: center; align-items: center; " >

        <a href="{{ route('product.create') }}" class="btn btn-primary my-3 col-6 ">Add Product<i class="fa-solid fa-plus"></i></a>

</div>

<div class="table-responsive-lg">
    <table class="table table-white table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">index no</th>
                <th scope="col">ProductName</th>
                <th scope="col">productpic1</th>
                {{-- <th scope="col">productpic2</th>
                <th scope="col">productpic3</th> --}}
                <th scope="col">price</th>
                <th scope="col">oprations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                
            
            <tr class="text-center">
                
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $item->pname }}</td>
                <td><img src="{{ $item->pro_pic1 }}" height="150" width="150" alt="/img/no_img.jpg">
                {{-- <td><img src="{{ $item->pro_pic2 }}" height="100" width="100" alt="/img/no_img.jpg">
                <td><img src="{{ $item->pro_pic3 }}" height="100" width="100" alt="/img/no_img.jpg"> --}}
                <td><i class="fa-solid fa-indian-rupee-sign"></i>{{ $item->pro_price }}</td>



                 <td>
                    <a href="{{route('product.show',$item->_id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('product.edit', $item->_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <form action="{{ route('product.destroy', $item->_id)}}" class="d-inline" onsubmit="confirmDelete(event)"
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