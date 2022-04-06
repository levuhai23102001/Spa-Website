@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Hồ sơ của bạn</title>
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
    @yield('profile')
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