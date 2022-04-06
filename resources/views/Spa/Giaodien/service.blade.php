@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Dịch vụ</title>
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
                        <a class="nav-link" href="/eluvspa">Trang Chủ</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link active" href="dich-vu">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('san-pham') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tips">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lien-he">Liên Hệ</a>
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
                            echo '<a href="ho-so" class="dropdown-item">';
                            echo '<i class="fas fa-user fa-md pr-3"></i>';
                            echo '<span class="poppin">Hồ Sơ</span>';
                            echo '</a>';
                            echo '<a href="#!" class="dropdown-item">';
                            echo '<i class="fas fa-cog fa-md pr-3"></i>';
                            echo '<span class="poppin">Cài Đặt</span>';
                            echo '</a>';
                            echo '<div class="dropdown-divider"></div>';
                            echo '<a href="{{ url(dang-xuat) }}" class="dropdown-item">';
                            echo '<i class="fas fa-sign-out-alt fa-md pr-3"></i>';
                            echo '<span class="poppin">Đăng Xuất</span>';
                            echo '</a>';
                            echo '</div>';
                            echo '</li>';
                        } else {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="dang-nhap" title="Đăng nhập">';
                            echo '<i class="fas fa-user fa-md"></i>';
                            echo '</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--service-->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <h3 class="title-h3">Dịch Vụ</h3>
                <a href="/eluvspa" class="tags">Trang chủ</a> / <a  href="dich-vu" class="tags">Dịch vụ</a>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row">
        @foreach($service as $ser)
            <div class="col-md-6 pt-3 scale">
                <div class="hidden">
                    <a class="link-service" href="{{ URL::to('eluvspa/dich-vu/'.$ser->Slug_service) }}">
                        <img class="ser-img" src="/img/service-img/{{$ser->Service_img}}">   
                    </a>
                </div>
                <div class="ser-name text-center pt-3">
                    <a href="{{ URL::to('eluvspa/dich-vu/'.$ser->Slug_service) }}">{{$ser->ServiceName}}</a>
                    <hr id="hr-optime">
                </div>
                <div class="view-detail text-center pb-2">
                    <a href="{{ URL::to('eluvspa/dich-vu/'.$ser->Slug_service) }}">XEM CHI TIẾT</a>
                </div>
            </div>
        @endforeach
        </div> 
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{$service->render('Spa.Giaodien.pagination')}}
        </div>
    </div>
@endsection
