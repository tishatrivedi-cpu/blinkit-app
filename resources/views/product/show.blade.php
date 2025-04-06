@include('header')

<div class="d-flex align-items-center mb-3 ">
    
   <ol class="breadcrumb text-primary" >
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-primary">Home</a>
                </li>
                <li class="breadcrumb-item"  aria-current="page"><a href="/product" style="text-decoration: none" class="text-primary">Product</a></li>
                <li class="breadcrumb-item"  aria-current="page">Show-product</li>
                
              </ol>
 </div>

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <a href="/product" style="width: 200px" class="btn btn-primary m-3"><i class= "fa-solid fa-left-long" ></i>Back</a>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{$product->pro_pic1}}" class="card-img-top" alt="Product 1" height="170" width="">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$product->pname}}</h4>
                        <p class="card-text">{{$product->pro_desc}}</p>
                        <p class="price"><i class="fa-solid fa-indian-rupee-sign"></i>{{$product->pro_price}}</p>
                        <p class="card-text"><h5>Discount</h5>{{$product->pro_disc}}</p>
                        <p class="card-text"><h5>Packing Type</h5>{{$product->pack_type}}</p> 
                        
                        
                    </div>
                </div>
             </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{$product->pro_pic2}}" class="card-img-top" alt="Product 1" height="170" width="">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$product->pname}}</h4>
                        <p class="card-text">{{$product->pro_desc}}</p>
                        <p class="price"><i class="fa-solid fa-indian-rupee-sign"></i>{{$product->pro_price}}</p>
                        <p class="card-text"><h5>Discount</h5>{{$product->pro_disc}}</p>
                        <p class="card-text"><h5>Packing Type</h5>{{$product->pack_type}}</p>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{$product->pro_pic3}}" class="card-img-top" alt="Product 1" height="170" width="">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$product->pname}}</h4>
                        <p class="card-text">{{$product->pro_desc}}</p>
                        <p class="price"><i class="fa-solid fa-indian-rupee-sign"></i>{{$product->pro_price}}</p>
                        <p class="card-text"><h5>Discount</h5>{{$product->pro_disc}}</p>
                        <p class="card-text"><h5>Packing Type</h5>{{$product->pack_type}}</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>  






@include('footer')