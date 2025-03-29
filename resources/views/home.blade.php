@include('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Admin Dashboard Cards</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* body {
            background-color: #f0f2f5;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        } */
        
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            max-width: 1200px;
            width: 100%;
        }
        
        .card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            padding: 20px;
            background: linear-gradient(to right, #4776E6, #8E54E9);
            position: relative;
            color: white;
            text-align: left;
        }
        
        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .card-header .subtitle {
            font-size: 12px;
            opacity: 0.8;
        }
        
        .card-body {
            padding: 25px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-value {
            font-size: 32px;
            font-weight: 700;
            color: #333;
        }
        
        .card-trend {
            font-size: 14px;
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        
        .up {
            color: #4CAF50;
        }
        
        .down {
            color: #F44336;
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }
        
        .card-footer {
            padding: 15px 20px;
            background: #f9f9f9;
            border-top: 1px solid #eee;
            font-size: 13px;
            color: #666;
            display: flex;
            justify-content: space-between;
        }
        
        .progress-container {
            height: 6px;
            background-color: #f0f0f0;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 5px;
            width: 100%;
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 3px;
        }
        
        /* Card specific styles */
        .users-card .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .users-card .card-icon {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .sales-card .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .sales-card .card-icon {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .orders-card .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .orders-card .card-icon {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .tasks-card .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
        }
        
        .tasks-card .card-icon {
            background: linear-gradient(to right,#4776E6, #8E54E9);
        }
        
        .users-card .progress-bar {
            background: #8E54E9;
            width: 85%;
        }
        
        .sales-card .progress-bar {
            background: #38ef7d;
            width: 70%;
        }
        
        .orders-card .progress-bar {
            background: #FFC837;
            width: 60%;
        }
        
        .tasks-card .progress-bar {
            background: #DD2476;
            width: 45%;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .card {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        
        /* Responsive tweaks */
        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="card users-card">
            <div class="card-header">
                <h2>Total Category</h2>
                <div class="subtitle">All Category</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$category_count}}</div>
                    <div class="card-trend up">
                        {{$category_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                     <a href="/category" style="color: white"><i class="fa-solid fa-list"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated 2 hours ago</span>
                <span>85% of target</span>
            </div>
        </div>
        
        <div class="card sales-card">
            <div class="card-header">
                <h2>Total SubCategory</h2>
                <div class="subtitle">All Subcategory</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$subcat_count}}</div>
                    <div class="card-trend up">
                        {{$subcat_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                    <a href="/subcategory" style="color: white"><i class="bi bi-border-all"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated 35 min ago</span>
                <span>70% of daily goal</span>
            </div>
        </div>
        
        <div class="card orders-card">
            <div class="card-header">
                <h2>New Orders</h2>
                <div class="subtitle">Pending fulfillment</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$order_count}}</div>
                    <div class="card-trend down">
                        {{$order_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                    <a href="/order" style="text-decoration: none">📦</a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated 15 min ago</span>
                <span>60% processed</span>
            </div>
        </div>
        
        <div class="card tasks-card">
            <div class="card-header">
                <h2>Total Product</h2>
                <div class="subtitle">All Products</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$product_count}}</div>
                    <div class="card-trend down">
                       {{$product_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                     <a href="/subcategory" style="color: white"><i class="fa-solid fa-boxes-stacked"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated just now</span>
                <span>45% completed</span>
            </div>
        </div>
    </div>
    <div class="dashboard mt-5">
        <div class="card users-card">
            <div class="card-header">
                <h2>Total Store</h2>
                <div class="subtitle">All Store</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$store_count}}</div>
                    <div class="card-trend up">
                        {{$store_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                
                <div class="card-icon">
                      <a href="/store" style="color: white"><i class="fa-solid fa-store"></i></a>
                </div>
                
            </div>
            <div class="card-footer">
                <span>Updated 2 hours ago</span>
                <span>85% of target</span>
            </div>
        </div>
        
        <div class="card sales-card">
            <div class="card-header">
                <h2>Total Coupon</h2>
                <div class="subtitle">All Coupon</div>
            </div>
            <div class="card-body">
                <div>
                  <p>Active</p>
                    <div class="card-value">{{$ca_count}}</div>
                    <div class="card-trend up">
                        {{$ca_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div>
                  <p>Deactive</p>
                    <div class="card-value">{{$cd_count}}</div>
                    <div class="card-trend up">
                        {{$cd_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                    <a href="/coupon" style="color: white"><i class="bi bi-calendar2"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated 35 min ago</span>
                <span>70% of daily goal</span>
            </div>
        </div>
        
        <div class="card orders-card">
            <div class="card-header">
                <h2>Total Users</h2>
                <div class="subtitle">Total Users</div>
            </div>
            <div class="card-body">
                <div>
                    <div class="card-value">{{$user_count}}</div>
                    <div class="card-trend down">
                        {{$user_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                    <a href="/store" style="color: white"><i class="fa-solid fa-user"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated 15 min ago</span>
                <span>60% processed</span>
            </div>
        </div>
        
        <div class="card tasks-card">
            <div class="card-header">
                <h2>Total Banner</h2>
                <div class="subtitle">All Banner</div>
            </div>
            <div class="card-body">
                <div>

                    <p>Active</p>
                    <div class="card-value">{{$ba_count}}</div>
                    <div class="card-trend down">
                       {{$ba_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div>
                  <p>Deactive</p>
                    <div class="card-value">{{$bd_count}}</div>
                    <div class="card-trend down">
                       {{$bd_count}}
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
                <div class="card-icon">
                     <a href="/store" style="color: white"><i class="fa-solid fa-desktop"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <span>Updated just now</span>
                <span>45% completed</span>
            </div>
        </div>
    </div>
        


<hr class="mt-5">
          <h1 class="mt-3 text-center">Recent Orders</h1>
<hr>
<table class="table table-striped col-6" >
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Username</th>
            <th>Pic</th>
            <th>Property name</th>
            <th>Price</th>
            <th>Total amount</th>





        </tr>
    </thead>
    <tbody>

        @foreach ( $orders as $item)    
            <tr>
                <td>{{$loop->index + 1}}</td>
                @foreach ($user as $i)
                    
                @if ($item->uid===$i->_id)
                <td>{{$i->username}}</td>
                @endif
                @endforeach
                <td><img src="{{$item->pic1}}" height="50" width="50" alt=""></td>
                <td>{{$item->pname}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->tot_amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>



{{-- 
<div class="row gx-3">
              <div class="col-md-3 col-sm-6 col-12" >
                <div class="bg-transparent-light rounded-1 mb-3 position-relative" style=" background: #3674B5;">
                  <div class="p-3 text-white">
                    <div class="mb-2">
                      <i class="bi bi-bar-chart fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal"><a href="/order" style="text-decoration: none; color:white
                      ">Category</a></h5>
                      <h3 class="m-0">{{$category_count}}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative" style=" background: #578FCA;">
                  <div class="p-3 text-white">
                    <div class="mb-2">
                      <i class="bi bi-bag-check fs-1 lh-1"></i>
                    </div>
                
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal"><a href="/order" style="text-decoration: none; color:white
                      ">Orders</a></h5>
                      <h3 class="m-0">{{$order_count}}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative" style=" background: #A1E3F9;">
                  <div class="p-3 text-white">
                    {{-- <div class="arrow-label">+18%</div> --}}
                    {{-- <div class="mb-2">
                      <i class="bi bi-box-seam fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal"><a href="/subcategory" style="text-decoration: none; color:white
                      ">Subcategory</a></h5>
                      <h3 class="m-0">{{$subcat_count}}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative" style=" background: #D1F8EF;">
                  <div class="p-3 text-white">
                    {{-- <div class="arrow-label">+24%</div> --}}
                    {{-- <div class="mb-2">
                      <i class="bi bi-bell fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal"><a href="/product" style="text-decoration: none; color:white
                      ">Product</a></h5>
                      <h3 class="m-0">{{$product_count}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="row gx-3">
              <div class="col-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Revenue</h5>
                  </div>
                  <div class="card-body">
                    <div id="revenue"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-3">
              <div class="col-xl-6 col-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Orders</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table align-middle">
                        <thead>
                          <tr>
                            <th>index</th>
                            <th>orderno</th>
                            <th>ProductName</th>
                            <th>Amount</th>
                            <th>Cash&online</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="grd-info-light">
                            <td>
                              <a href="" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>101</td>
                            <td>Vegitables</td>
                            <td>
                              500
                            </td>
                            <td>
                              <p class="m-0 text-info">Online</p>
                            </td>
                          </tr>
                          <tr class="grd-success-light">
                            <td>
                              <a href="" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>102</td>
                            <td>Fruits</td>
                            <td>
                              400
                            </td>
                            <td>
                              <p class="m-0 text-success">Cash</p>
                            </td>
                          </tr>
                          <tr class="grd-warning-light">
                            <td>
                              <a href="" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>103</td>
                            <td>Chess</td>
                            <td>
                              545
                            </td>
                            <td>
                              <p class="m-0 text-info">Online</p>
                            </td>
                          </tr>
                          <tr class="grd-danger-light">
                            <td>
                              <a href="" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>104</td>
                            <td>SunScreen Gel</td>
                            <td>
                              454
                            </td>
                            <td>
                              <p class="m-0 text-success">Cash</p>
                            </td>
                          </tr>
                          <tr class="grd-primary-light">
                            <td>
                              <a href="" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>105</td>
                            <td>Gulabjambun</td>
                            <td>
                              212
                            </td>
                            <td>
                              <p class="m-0 text-info">Online</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title">Years Profits</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table align-middle">
                        <thead>
                          <tr>
                            <th>index</th>
                            <th>TimeDuration</th>
                            <th>Profit</th>
                            <th>Percentage</th>
                            <th>Growth</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="grd-info-light">
                            <td>
                              <a href="javascript:void()" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>1 Year</td>
                            <td>56,000</td>
                            <td>25%</td>
                            <td>
                              <p class="m-0 text-info">8% high</p>
                            </td>
                          </tr>
                          <tr class="grd-success-light">
                            <td>
                              <a href="javascript:void()" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>2 Year</td>
                            <td>35,000</td>
                            <td>23%</td>
                            <td>
                              <p class="m-0 text-success">12% low</p>
                            </td>
                          </tr>
                          <tr class="grd-warning-light">
                            <td>
                              <a href="javascript:void()" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>3 Year</td>
                            <td>28,000</td>
                            <td>18%</td>
                            <td>
                              <p class="m-0 text-warning">15% high</p>
                            </td>
                          </tr>
                          <tr class="grd-danger-light">
                            <td>
                              <a href="javascript:void()" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>4 Year</td>
                            <td>33,000</td>
                            <td>12%</td>
                            <td>
                              <p class="m-0 text-success">9% high</p>
                            </td>
                          </tr>
                          <tr class="grd-primary-light">
                            <td>
                              <a href="javascript:void()" class="text-danger">
                                <i class="bi bi-box-arrow-up-right fs-3"></i>
                              </a>
                            </td>
                            <td>5 Year</td>
                            <td>98,000</td>
                            <td>16%</td>
                            <td>
                              <p class="m-0 text-primary">3% low</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>  --}}

@include('footer')