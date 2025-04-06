
@php
    if (!Session::has('user')) {
        header("Location: " . url('/'));
        exit();
    }
@endphp

<!DOCTYPE html>
<html lang="en">

  


<!-- Mirrored from www.bootstrapget.com/demos/unity-bootstrap-admin-dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2025 07:59:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Templates - Dashboard Templates - Unify Admin Template</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta name="author" content="Bootstrap Gallery">
    <link rel="canonical" href="/https://www.bootstrap.gallery/">
    <meta property="og:url" content="/https://www.bootstrap.gallery/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="/assets/images/favicon.svg">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="/assets/fonts/bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/main.min.css">
    <!--<link rel="stylesheet" href="/assets/css/category.css">

      *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="/assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
  </head>

 <body>
  @php
        $user=Session::get('user')
    @endphp
    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- App header starts -->
      <div class="app-header d-flex align-items-center">

        <!-- Toggle buttons start -->
        <div class="d-flex col">
          <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="bi bi-list lh-1 text-white"></i>
          </button>
          <button class="pin-sidebar" id="pin-sidebar">
            <i class="bi bi-list lh-1 text-white"></i>
          </button>
        </div>
        <!-- Toggle buttons end -->

        <!-- App brand starts -->
         <div class="app-brand py-2 col" >  
          <a href="">
            <img src="/assets/images/logo2.png" class="logo" alt="Bootstrap Gallery" height="350" width="100">
          </a>
         </div> 
         
        <!-- App brand ends -->

        <!-- App header actions start -->
        <div class="header-actions col">
          {{-- <div class="d-lg-flex d-none align-items-center gap-2">
            <div class="dropdown">
              <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-grid fs-5 lh-1 text-white"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <!-- Row start -->
                <div class="d-flex gap-2 m-2">
                  <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                    <img src="/assets/images/brand-behance.svg" class="img-3x" alt="Admin Themes">
                  </a>
                  <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                    <img src="/assets/images/brand-gmail.svg" class="img-3x" alt="Admin Themes">
                  </a>
                  <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                    <img src="/assets/images/brand-google.svg" class="img-3x" alt="Admin Themes">
                  </a>
                  <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                    <img src="/assets/images/brand-bitcoin.svg" class="img-3x" alt="Admin Themes">
                  </a>
                  <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                    <img src="/assets/images/brand-dribbble.svg" class="img-3x" alt="Admin Themes">
                  </a>
                </div>
                <!-- Row end -->
              </div>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-exclamation-triangle fs-5 lh-1 text-white"></i>
                <span class="count-label">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <h5 class="fw-semibold px-3 py-2 text-primary">
                  Notifications
                </h5>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <div class="icon-box md bg-success rounded-circle me-3">
                      <i class="bi bi-exclamation-triangle text-white fs-4"></i>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Rosalie Deleon</h6>
                      <p class="mb-1 text-secondary">You have new order.</p>
                      <p class="small m-0 text-secondary">30 mins ago</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <div class="icon-box md bg-danger rounded-circle me-3">
                      <i class="bi bi-exclamation-octagon text-white fs-4"></i>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Donovan Stuart</h6>
                      <p class="mb-2">Membership has been expired.</p>
                      <p class="small m-0 text-secondary">2 days ago</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2">
                    <div class="icon-box md bg-warning rounded-circle me-3">
                      <i class="bi bi-exclamation-square text-white fs-4"></i>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Roscoe Richards</h6>
                      <p class="mb-2">Payment pending. Pay now.</p>
                      <p class="small m-0 text-secondary">3 days ago</p>
                    </div>
                  </div>
                </div>
                <div class="d-grid mx-3 my-1">
                  <a href="javascript:void(0)" class="btn btn-info">View all</a>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-bell fs-5 lh-1 text-white"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <h5 class="fw-semibold px-3 py-2 text-primary">Updates</h5>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <div class="icon-box md border border-success grd-success-light rounded-circle me-3">
                      <span class="text-success">DS</span>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Douglass Shaw</h6>
                      <p class="mb-1 text-secondary">
                        Membership has been ended.
                      </p>
                      <p class="small m-0 text-secondary">Today, 07:30pm</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <div class="icon-box md border border-danger grd-danger-light rounded-circle me-3">
                      <span class="text-danger">WG</span>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Willie Garrison</h6>
                      <p class="mb-1 text-secondary">
                        Congratulate, James for new job.
                      </p>
                      <p class="small m-0 text-secondary">Today, 08:00pm</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2">
                    <div class="icon-box md border border-warning grd-warning-light rounded-circle me-3">
                      <span class="text-warning">TJ</span>
                    </div>
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Terry Jenkins</h6>
                      <p class="mb-1 text-secondary">
                        Lewis added new schedule release.
                      </p>
                      <p class="small m-0 text-secondary">Today, 09:30pm</p>
                    </div>
                  </div>
                </div>
                <div class="d-grid mx-3 my-1">
                  <a href="javascript:void(0)" class="btn btn-info">View all</a>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-envelope-open fs-5 lh-1 text-white"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <img src="assets/images/user3.png" class="img-3x me-3 rounded-5" alt="Admin Theme">
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Angelia Payne</h6>
                      <p class="mb-1 text-secondary">
                        Membership has been ended.
                      </p>
                      <p class="small m-0 text-secondary">Today, 07:30pm</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2 border-bottom">
                    <img src="assets/images/user1.png" class="img-3x me-3 rounded-5" alt="Admin Theme">
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
                      <p class="mb-1 text-secondary">
                        Congratulate, James for new job.
                      </p>
                      <p class="small m-0 text-secondary">Today, 08:00pm</p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-item">
                  <div class="d-flex py-2">
                    <img src="assets/images/user4.png" class="img-3x me-3 rounded-5" alt="Admin Theme">
                    <div class="m-0">
                      <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                      <p class="mb-2 text-secondary">
                        Lewis added new schedule release.
                      </p>
                      <p class="small m-0 text-secondary">Today, 09:30pm</p>
                    </div>
                  </div>
                </div>
                <div class="d-grid mx-3 my-1">
                  <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="dropdown ms-3">
            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!"
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/assets/images/user3.jpg" class="rounded-2 img-3x" alt="Bootstrap Gallery">
              <div class="ms-2 text-truncate d-lg-block d-none text-white">
                <span class="d-flex opacity-50 small">{{$user->role}}</span>
                <span>{{$user->username}}</span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
              <div class="header-action-links">
                <a class="dropdown-item" href="/open_profile"><i
                    class="bi bi-person border border-primary text-primary"></i>Profile</a>
                <a class="dropdown-item" href="/open_changepassword"><i class="fa-solid fa-key border border-danger text-danger"></i>
                   {{-- <i class="bi bi-gear border border-danger text-danger"></i>--}}ChangePassword</a>  
                <a class="dropdown-item" href="/logout"><i
                    class="fa-solid fa-left-long border border-success text-success"></i>Logout</a> 
              </div>
               {{-- <div class="mx-3 mt-2 d-grid">
                <a href="/" class="btn btn-primary btn-sm">Logout</a>
              </div>  --}}
            </div>
          </div>
        </div>
        <!-- App header actions end -->
      </div>

      <!-- App header ends -->

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- Sidebar profile starts -->
          <div class="sidebar-profile">
            <img src="/assets/images/user3.jpg"  class="profile-user mb-3 " style="height: 40%;width:40%" alt="Admin Dashboard">
            <div class="text-center">
              <h6 class="profile-name m-0 text-nowrap text-truncate">
                {{$user->username}}
              </h6>
            </div>

             <div class="text-center">
              <h6 class="profile-name m-0 text-nowrap text-truncate">
                {{$user->role}}
              </h6>
            </div>
            
            {{-- <div class="d-flex align-items-center mt-lg-3 gap-2">
              <a href="calendar.html" class="icon-box md grd-success-light rounded-2">
                <i class="bi bi-calendar2-check fs-5 text-success"></i>
              </a>
              <a href="events.html" class="icon-box md grd-info-light rounded-2">
                <i class="bi bi-stickies fs-5 text-info"></i>
              </a>
              <a href="settings.html" class="icon-box md grd-danger-light rounded-2">
                <i class="bi bi-whatsapp fs-5 text-danger"></i>
              </a>
            </div> --}}
          </div>
          <!-- Sidebar profile ends -->
          <div class="sidebarMenuScroll">
            <!-- Sidebar menu starts -->
            <ul class="sidebar-menu">
              <li class="active current-page">
                <a href="/home">
                  <i class="bi bi-pie-chart"></i>
                  <span class="menu-text">Dashboard</span>
                </a>
              </li>
              <li class="">
                <a href="/category">
                 <i class="fa-solid fa-list"></i>
                  <span class="menu-text">Category</span>
                </a>
              </li>
              
                <li>
                <a href="/subcategory">
                  <i class="bi bi-border-all"></i>
                  <span class="menu-text">Subcategory</span>
                </a>
              </li>
              <li>
                <a href="/product">
                  <i class="fa-solid fa-boxes-stacked"></i>
                  <span class="menu-text">Product</span>
                </a>
              </li>
              <li>
                <a href="/banner">
                 <i class="fa-solid fa-desktop"></i>
                  <span class="menu-text">Banner</span>
                </a>
              </li>
              <li>
                <a href="/coupon">
                  <i class="bi bi-calendar2"></i>
                  <span class="menu-text">Coupon</span>
                </a>
              </li>
              <li>
                <a href="/store">
                 <i class="fa-solid fa-store"></i>
                  <span class="menu-text">Store</span>
                </a>
              </li>
             {{-- <li>
                <a href="/pincode">
                  <i class="fa-solid fa-city"></i>
                  <span class="menu-text">Pincode</span>
                </a>
              </li> --}}
             
              

               <li>
                <a href="/order">
                  <i class="fa-solid fa-id-card-clip"></i>
                  <span class="menu-text">Orders</span>
                </a>
              </li>

               <li>
                <a href="/allusers">
               <i class="fa-solid fa-user"></i>
                  <span class="menu-text">Users</span>
                </a>
              </li>

               {{-- <li>
                <a href="/profile">
                  <i class="fa-solid fa-id-card-clip"></i>
                  <span class="menu-text">Profile</span>
                </a>
              </li> --}}

              <li class="text-center" style="border: 20px solid white;">
                <a href="/logout" class="btn btn-pr"><i class= "fa-solid fa-left-long" ></i>Logout</a>
              </li>

              {{-- <li>
                <a href="events.html">
                  <i class="bi bi-calendar4"></i>
                  <span class="menu-text">Events</span>
                </a>
              </li>
              <li>
                <a href="subscribers.html">
                  <i class="bi bi-check-circle"></i>
                  <span class="menu-text">Subscribers</span>
                </a>
              </li>
              <li>
                <a href="contacts.html">
                  <i class="bi bi-wallet2"></i>
                  <span class="menu-text">Contacts</span>
                </a>
              </li>
              <li>
                <a href="settings.html">
                  <i class="bi bi-gear"></i>
                  <span class="menu-text">Settings</span>
                </a>
              </li>
              <li>
                <a href="profile.html">
                  <i class="bi bi-person"></i>
                  <span class="menu-text">Profile</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-code-square"></i>
                  <span class="menu-text">Cards</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="cards.html">Cards</a>
                  </li>
                  <li>
                    <a href="advanced-cards.html">Advanced Cards</a>
                  </li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-pie-chart"></i>
                  <span class="menu-text">Graphs</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="apex.html">Apex</a>
                  </li>
                  <li>
                    <a href="morris.html">Morris</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="maps.html">
                  <i class="bi bi-pin-map"></i>
                  <span class="menu-text">Maps</span>
                </a>
              </li>
              <li>
                <a href="tabs.html">
                  <i class="bi bi-slash-square"></i>
                  <span class="menu-text">Tabs</span>
                </a>
              </li>
              <li>
                <a href="modals.html">
                  <i class="bi bi-terminal"></i>
                  <span class="menu-text">Modals</span>
                </a>
              </li>
              <li>
                <a href="icons.html">
                  <i class="bi bi-textarea"></i>
                  <span class="menu-text">Icons</span>
                </a>
              </li>
              <li>
                <a href="typography.html">
                  <i class="bi bi-explicit"></i>
                  <span class="menu-text">Typography</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-upc-scan"></i>
                  <span class="menu-text">Authentication</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="login.html">Login</a>
                  </li>
                  <li>
                    <a href="signup.html">Signup</a>
                  </li>
                  <li>
                    <a href="forgot-password.html">Forgot Password</a>
                  </li>
                  <li>
                    <a href="reset-password.html">Reset Password</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="page-not-found.html">
                  <i class="bi bi-exclamation-diamond"></i>
                  <span class="menu-text">Page Not Found</span>
                </a>
              </li>
              <li>
                <a href="maintenance.html">
                  <i class="bi bi-exclamation-octagon"></i>
                  <span class="menu-text">Maintenance</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-code-square"></i>
                  <span class="menu-text">Multi Level</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="#!">Level One Link</a>
                  </li>
                  <li>
                    <a href="#!">
                      Level One Menu
                      <i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="#!">Level Two Link</a>
                      </li>
                      <li>
                        <a href="#!">Level Two Menu
                          <i class="bi bi-chevron-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li>
                            <a href="#!">Level Three Link</a>
                          </li>
                          <li>
                            <a href="#!">Level Three Link</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#!">Level One Link</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div> --}}
          <!-- Sidebar menu ends -->

        </nav>
           <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App hero header starts -->
          <div class="app-hero-header mb-4">

            <!-- Breadcrumb and Stats start -->
            <div class="d-flex align-items-center mb-3">

              <!-- Breadcrumb start -->
           
          {{-- <div class="d-flex align-items-center mb-3" style="">
                  <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <i class="bi bi-house lh-1"></i>
                  <a href="/home" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                
              </ol>
          </div> --}}
    



             
              <!-- Breadcrumb end -->

              <!-- Sales stats start -->
              {{-- <div class="ms-auto d-lg-flex d-none flex-row">
                <div class="d-flex flex-row gap-1">
                  <button class="btn btn-sm btn-dark">Today</button>
                  <button class="btn btn-sm btn-dark btn-transparent">
                    7 Days
                  </button>
                  <button class="btn btn-sm btn-dark btn-transparent">
                    15 Days
                  </button>
                  <button class="btn btn-sm btn-dark btn-transparent">
                    30 Days
                  </button>
                  <button class="btn btn-sm btn-dark btn-transparent">
                    90 Days
                  </button>
                </div>
              </div> --}}
              <!-- Sales stats end -->
            </div>
            <!-- Breadcrumb and stats end -->

            <!-- Row start -->
            {{-- <div class="row gx-3">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                  <div class="p-3 text-white">
                    <div class="mb-2">
                      <i class="bi bi-bar-chart fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal">Sales</h5>
                      <h3 class="m-0">3500</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                  <div class="p-3 text-white">
                    <div class="mb-2">
                      <i class="bi bi-bag-check fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal">Orders</h5>
                      <h3 class="m-0">2900</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                  <div class="p-3 text-white">
                    <div class="arrow-label">+18%</div>
                    <div class="mb-2">
                      <i class="bi bi-box-seam fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal">Invoices</h5>
                      <h3 class="m-0">6500</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                  <div class="p-3 text-white">
                    <div class="arrow-label">+24%</div>
                    <div class="mb-2">
                      <i class="bi bi-bell fs-1 lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="m-0 fw-normal">Alerts</h5>
                      <h3 class="m-0">7200</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- Row end -->
          </div>
          <!-- App Hero header ends -->
          <!-- App body starts -->
          <div class="app-body">