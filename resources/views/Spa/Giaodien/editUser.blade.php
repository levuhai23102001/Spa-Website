@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Chỉnh sửa hồ sơ</title>
@endsection

@section('content')
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/eluvspa" title="Trang chủ">
                <img style="width: 150px; height: 75px" src="/logo/ELUV_1.gif">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i style="color: white" class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('eluvspa') }}">Trang Chủ</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('eluvspa/dich-vu') }}">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('san-pham') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('eluvspa/tips') }}">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('eluvspa/lien-he') }}">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('eluvspa/gio-hang') }}" title="Giỏ hàng">
                            <i class="fas fa-shopping-cart fa-md"></i>
                        </a>
                    </li>
                    <?php
                        $user_name = Session::get('Username');
                        if($user_name){
                            echo '<li class="nav-item dropdown">';
                            echo '<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo '<div class="media align-items-center">';
                            echo '<span class="avatar avatar-sm rounded-circle">';
                            echo '<img style="width:36px; height:36px; border: 2px solid #ff3366;" src="/logo/Artwork_Middle_Nier.gif">';
                            echo '</span>';
                            echo '<div class="media-body  ml-2  d-none d-lg-block">';
                            echo '<span class="mb-0 text-sm  font-weight-bold poppin">';
                            echo $user_name;
                            echo '</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                            echo '<div class="dropdown-menu  dropdown-menu-right animate__animated animate__fadeInUp">';
                            echo '<a href="/eluvspa/ho-so" class="dropdown-item">';
                            echo '<i class="fas fa-user fa-md pr-3"></i>';
                            echo '<span class="poppin">Hồ Sơ</span>';
                            echo '</a>';
                            echo '<a href="#!" class="dropdown-item">';
                            echo '<i class="fas fa-cog fa-md pr-3"></i>';
                            echo '<span class="poppin">Cài Đặt</span>';
                            echo '</a>';
                            echo '<div class="dropdown-divider"></div>';
                            echo '<a href="/dang-xuat/" class="dropdown-item">';
                            echo '<i class="fas fa-sign-out-alt fa-md pr-3"></i>';
                            echo '<span class="poppin">Đăng Xuất</span>';
                            echo '</a>';
                            echo '</div>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="/eluvspa/dang-nhap" title="Đăng nhập">';
                            echo '<i class="fas fa-user fa-md"></i>';
                            echo '</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Profile -->
    <!--background-->
<div class="container mb-5" style="margin-top: 250px">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img style="width: 100%; height: 193px;" src="/imgs/background-3.jpg" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img style="width: 134px; height: 134px;" src="/logo/Artwork_Middle_Nier.gif" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Kết nối</a>
                <a href="#" class="btn btn-sm btn-default float-right">tin nhắn</a>
              </div>
            </div>
            <div class="card-body pt-3">
              <div class="text-center">
                <h5 class="h3">
                    {{$profile_user->LastName}}<span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-700">
                  Đà Nẵng, Việt Nam
                  <i class="ni location_pin mr-2"></i>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Music Producer - ELUV Team
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><span style="color: black;">Vietnam - Korea University of Information and Communication Technology</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <h3 class="mb-0">Hồ sơ của tôi</h3>
              </div>
            </div>
                    @if(count($errors) > 0)
                      <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
                          @foreach($errors->all() as $err)
                              {{$err}}       
                          @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
            <div class="card-body">
              <form action="{{$profile_user->User_ID}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <h6 class="heading-small text-muted mb-4" style="color: black !important">Thông tin tài khoản</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên đăng nhập</label>
                        <input type="text" name="Username" id="input-username" class="form-control" placeholder="Tên đăng nhập" value="{{$profile_user->Username}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Địa chỉ Email</label>
                        <input type="email" name="Email" id="input-email" class="form-control" placeholder="Email" value="{{$profile_user->Email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Họ</label>
                        <input type="text" name="FirstName" id="input-first-name" class="form-control" placeholder="Họ" value="{{$profile_user->FirstName}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Tên</label>
                        <input type="text" name="LastName" id="input-last-name" class="form-control" placeholder="Tên" value="{{$profile_user->LastName}}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4" style="color: black !important">Thông tin liên hệ</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Địa chỉ</label>
                        <input id="input-address" name="Address" class="form-control" placeholder="Địa chỉ" value="{{$profile_user->Address}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Thành phố</label>
                        <input type="text" name="City" id="input-city" class="form-control" placeholder="Thành phố" value="{{$profile_user->City}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Quốc gia</label>
                        <input type="text" name="Country" id="input-country" class="form-control" placeholder="Quốc gia" value="{{$profile_user->Country}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" name="PostalCode" id="input-postal-code" class="form-control" placeholder="Postal code" value="{{$profile_user->PostalCode}}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4" style="color: black !important">Ghi chú</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Ghi chú</label>
                    <textarea rows="4" name="AboutMe" class="form-control" placeholder="Viết một vài thứ về bạn ...">{!!$profile_user->AboutMe!!}</textarea>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-md btn-success  mr-4 ">Chỉnh sửa</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
@endsection

@section('js')
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>
  <script src="/js/admin/main.js"></script>
@endsection