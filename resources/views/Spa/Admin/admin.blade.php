<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <link rel="shortcut icon" type="image/png" href="/logo/ELUV_64x64.png">
  @yield('title')
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  @yield('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-dark" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ url('admin/dashboards') }}">
          <img class="logo_64x64" src="/logo/ELUV_64x64.png">
          <img class="gif_logo" style="width: 200px;" src="/logo/ELUV_1.gif">   
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/dashboards') }}">
                <i style="font-size: 1.15rem;" class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Tổng quan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/profile-admin') }}">
                <i style="font-size: 1.15rem;" class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Hồ sơ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed-sp" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                  <i style="color: #ff0000 !important" class="fab fa-product-hunt"></i>
                  <span class="nav-link-text">Quản lý Sản phẩm</span>
                  <i class="fas fa-angle-right flip-1" aria-hidden="true"></i>
              </a>
              <div class="collapse-sp" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url ('admin/products') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách sản phẩm </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url ('admin/add-prod') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm sản phẩm </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="prodCate" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách loại sản phẩm </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="add-prodCate" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm loại sản phẩm </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed-dv" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                  <i style="color: #da00ff !important" class="fab fa-usps"></i>
                  <span class="nav-link-text">Quản lý Dịch vụ</span>
                  <i class="fas fa-angle-right flip-2" aria-hidden="true"></i>
              </a>
              <div class="collapse-dv" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url ('admin/services') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách dịch vụ </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url ('admin/add-sers') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm dịch vụ </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed-nv" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                  <i style="color: #97FFFF !important" class="far fa-address-card"></i>
                  <span class="nav-link-text">Quản lý Nhân viên</span>
                  <i class="fas fa-angle-right flip-3" aria-hidden="true"></i>
              </a>
              <div class="collapse-nv" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url ('admin/staffs') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách nhân viên </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url ('admin/add-staff') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm nhân viên </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/users')}}">
              <i style="color: #fec6ff !important" class="fas fa-users"></i>
                <span class="nav-link-text">Quản lý Khách hàng</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed-dh" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                  <i style="color: #0288d1 !important" class="fas fa-table"></i>
                  <span class="nav-link-text">Quản lý Đơn đặt hàng</span>
                  <i class="fas fa-angle-right flip-5" aria-hidden="true"></i>
              </a>
              <div class="collapse-dh" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url('admin/order-prod') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách đặt sản phẩm </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/booking-ser') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách đặt dịch vụ</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed-tt" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                  <i style="color: #d81b60 !important" class="fas fa-newspaper"></i>
                  <span class="nav-link-text">Quản lý Tin tức</span>
                  <i class="fas fa-angle-right flip-6" aria-hidden="true"></i>
              </a>
              <div class="collapse-tt" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ url('admin/tips') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách tin tức </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/add-tip') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm tin tức </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/tipCate') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách loại tin </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/add-tipCate') }}" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Thêm loại tin </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/contacts')}}">
                <i style="color: #00e2ff !important" class="fas fa-file-contract"></i>
                <span class="nav-link-text">Quản lý Phản hồi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendar">
                <i style="color: #f5583d; font-size: 1.15rem;"  class="ni ni-calendar-grid-58"></i>
                <span class="nav-link-text">Lịch</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="charts">
                <i style="color: #05bcaa; font-size: 1.15rem;" class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Biểu đồ</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Hambuger btn -->
          <div class="hamburger-btn">
            <i id="hidden" class="fas fa-bars fa-lg"></i>
          </div>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <!-- <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="color: #FF3366" class="ni ni-bell-55"></i>
              </a> -->
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="color: #FF3366" class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="fab fa-facebook-f fa-lg"></i>
                    </span>
                    <small>Facebook</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img style="width:36px; height:36px; border: 2px solid #ff3366;" src="/logo/Artwork_Middle_Nier.gif">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">
                      <?php
                        $admin_name = Session::get('AdminName');
                        if($admin_name){
                          echo $admin_name;
                        }
                      ?>
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="profile-admin" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Hồ sơ của tôi</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Cài đặt</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Đăng xuất</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Page content -->
    @yield('pageContents')

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>

  <script src="/js/admin/main.js"></script>
  @yield('script')

</body>
</html>
