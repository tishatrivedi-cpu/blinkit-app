@include('header')


<div class="d-flex align-items-center mb-3 ">

    <ol class="breadcrumb text-primary">
        <li class="breadcrumb-item">
            <i class="bi bi-house lh-1"></i>
            <a href="/home" class="text-primary">Home</a>
        </li>
        <li class="breadcrumb-item" aria-current="page">Orders</li>
    </ol>
</div>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

<div class="container m-2" style="display: flex; justify-content: center; align-items: center; ">
    <a href="" class="btn btn-primary my-3 col-6 ">All Orders</a>

</div>

<div class="table-responsive-lg">
    <table class="table table-white table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">index no</th>
                <th scope="col">Orderno</th>
                <th scope="col">ppic</th>
                <th scope="col">pname</th>
                <th scope="col">Amount</th>
                <th scope="col">qty</th>
                <th scope="col">Total_Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Cash&online</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="text-center">

                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $item->pid }}</td>
                    <td><img src="{{ $item->pic1 }}" height="100" width="100" alt="/img/no_img.jpg">
                    <td>{{ $item->pname }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->c_o }}</td>

                    <td>
                                        <a href="/status_order/{{ $item->_id }}">
                                            @if ($item->status == 1)
                                                <span class="badge bg-warning">RECEIVED</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge bg-dark">SHIPPING</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge bg-primary text-white">DISPATCHED</span>
                                            @elseif ($item->status == 4)
                                                <span class="badge bg-success">OUT FOR DELIVERY</span>
                                            @else
                                                <span class="badge" style="background-color:rgb(255, 132, 0);"><i
                                                        class="fa-solid fa-circle-check mr-2"></i></i>DELIVERED
                                                </span>
                                            @endif
                                        </a>
                        </td>

                    {{-- @if (strcmp($item->c_o, 'CASH'))
                        <td>CASH PAYMENT</td>
                        
                    @else
                        <td>ONLINE PAYMENT</td>

                    @endif --}}


                    {{-- <td><a href="" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td> --}}


                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>





@include('footer')
