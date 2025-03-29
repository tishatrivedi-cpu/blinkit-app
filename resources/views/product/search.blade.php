@include('header')

<div class="container bg py-5 mb-5 ">
    <center>
        <h2 class="py-2">Searched poducts
            <a href="/product" class=" btn btn-dark"><i class="fas fa-backward mr-2 text-lg"></i>BACK</a>
        </h2>
        <p class="lead">Searched category wise products</p>
    </center>
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-6 mb-3"> <!-- 6 columns per card (2 per row) -->
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{$item->pro_pic1}}" style="height: 150px; width:140px;"
                                    class="img-thumbnail">
                            </div>
                            <div class="col-8">
                                <h6 class="">{{ $item->pname }}</h6>
                                <h6 class="mt-5"><span
                                        class=" alert alert-secondary text-center ">Subcategory: {{ $item->subcategory }}</span></h6>
                            </div>
                            <h6 class="ms-2 mt-2">Rs.{{ $item->pro_price }}</h6>
                            <h6 class="text-success ms-2">{{ $item->pro_disc }}Off</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('footer')