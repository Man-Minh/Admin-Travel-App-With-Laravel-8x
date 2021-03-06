<!doctype html>
<html class="no-js h-100" lang="en">
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Travel App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('../styles/shards-dashboards.1.1.0.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../styles/extras.1.1.0.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>

<body class="h-100">
 
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">
                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                  src="{{asset('../images/shards-dashboards-logo.svg')}}" alt="Shards Dashboard">
                <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>
        <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
          <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-search"></i>
              </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
              aria-label="Search">
          </div>
        </form>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="/admin/thongke">
                <i class="material-icons">edit</i>
                <span>Th???ng K??</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/dsdiadanh">
                <i class="material-icons">vertical_split</i>
                <span>Qu???n l?? ?????a danh</span>
              </a>
            </li>
 
            <li class="nav-item">
              <a class="nav-link " href="/admin/nhucau">
                <i class="material-icons">view_module</i>
                <span>Qu???n L?? Nhu C???u</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/dexuat">
                <i class="material-icons">table_chart</i>
                <span>Qu???n L?? ????? Xu???t</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/taikhoan">
                <i class="material-icons">person</i>
                <span>Qu???n L?? T??i Kho???n</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/errors">
                <i class="material-icons">error</i>
                <span>Errors</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- Main Navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
              <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                  aria-label="Search">
              </div>
            </form>
            <ul class="navbar-nav border-left flex-row ">
              <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="nav-link-icon__wrapper">
                    <i class="material-icons">&#xE7F4;</i>
                    <span class="badge badge-pill badge-danger">2</span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">
                    <div class="notification__icon-wrapper">
                      <div class="notification__icon">
                        <i class="material-icons">&#xE6E1;</i>
                      </div>
                    </div>
                    <div class="notification__content">
                      <span class="notification__category">Analytics</span>
                      <p>Your website???s active users count increased by
                        <span class="text-success text-semibold">28%</span> in the last week. Great job!
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="notification__icon-wrapper">
                      <div class="notification__icon">
                        <i class="material-icons">&#xE8D1;</i>
                      </div>
                    </div>
                    <div class="notification__content">
                      <span class="notification__category">Sales</span>
                      <p>Last week your store???s sales count decreased by
                        <span class="text-danger text-semibold">5.52%</span>. It could have been worse!
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button"
                  aria-haspopup="true" aria-expanded="false">
                  @auth  <img class="user-avatar rounded-circle mr-2"  src="{{ asset('../images/avatarDefault.jpg')}}" alt="User Avatar">  @endauth <!--Man update 06/02/2022-->
                  <span class="d-none d-md-inline-block">@auth {{Auth::user()->name}} @endauth</span> <!--Man update 06/02/2022-->
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item" href="../user-profile-lite.html">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                  <a class="dropdown-item" href="../components-blog-posts.html">
                    <i class="material-icons">vertical_split</i> Blog Posts</a>
                  <a class="dropdown-item" href="../add-new-post.html">
                    <i class="material-icons">note_add</i> Add New Post</a>
                  <div class="dropdown-divider"></div>
                  <form action="{{route('logout')}}" method="post">@csrf <button type="submit" class="btn danger" style="border: none;background-color: inherit; padding: 14px 28px;font-size: 12;cursor: pointer;display: inline-block;" >
                        Logout</button> </form>  
                </div>
              </li>
            </ul>
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
        </div>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">

       
<div class="col-12 grid-margin stretch-card">
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">C???p nh???t Nhu C???u</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="{{route('admin.xuLySuaNhuCau',['nhuCau'=>$nhuCau[0]])}}" method="POST" >
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label for="exampleInputName1">T??n nhu c???u</label>
                        @if ($errors->has('ten_Loai')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('ten_Loai') }} </span>
                        @endif
                        <input type="text" name="ten_Loai" value="{{$nhuCau[0]->ten_Loai}}" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">C???p nh???t</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
  </div>
       
   <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
          </ul>
          <span class="copyright ml-auto my-auto mr-2">Copyright ?? 2018
            <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
          </span>
        </footer>
      </main>
    </div>
  </div>
  <div class="promo-popup animated">
    <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
      <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>
    <div class="pp-intro-bar"> Need More Templates?
      <span class="close">
        <i class="material-icons">close</i>
      </span>
      <span class="up">
        <i class="material-icons">keyboard_arrow_up</i>
      </span>
    </div>
  
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
  <script src="../scripts/extras.1.1.0.min.js"></script>
  <script src="../scripts/shards-dashboards.1.1.0.min.js"></script>
  <script src="../scripts/app/app-blog-overview.1.1.0.js"></script>
</body>

</html>