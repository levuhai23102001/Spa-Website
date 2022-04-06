@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Thư giãn & Làm đẹp</title>
@endsection

@section('content')
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="eluvspa" title="Trang chủ">
                <img style="width: 150px; height: 75px" src="/logo/ELUV_1.gif">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i style="color: white" class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="eluvspa">Trang Chủ</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="eluvspa/dich-vu">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="san-pham">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eluvspa/tips">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eluvspa/lien-he">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eluvspa/gio-hang" title="Giỏ hàng">
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
                            echo '<a class="nav-link" href="eluvspa/dang-nhap" title="Đăng nhập">';
                            echo '<i class="fas fa-user fa-md"></i>';
                            echo '</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--slides-->
    <div id="slides" class="carousel carousel-fade slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner" id="w-banner">
            <div class="carousel-item active">
                <img src="/img/slides/spa-slide-3.jpg" style="object-fit:cover">
                <div class="carousel-caption text-left">
                    <h2 class="display-4 slide-brand animate__animated animate__fadeInLeft">Beauty is Life</h2>
                    <hr id="bner">
                    <p class="title-slide animate__animated animate__fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed aliquam libero. Duis dictum tincidunt dui et interdum. Vivamus id elit nec lacus tincidunt efficitur eget eget justo. Aenean blandit mi quis ipsum interdum ullamcorper. Nunc eu arcu mattis, accumsan sem eu, tempor augue. Nunc maximus tincidunt sollicitudin.</p>
                    <a href="#bking-ser" role="button" class="btn btn-outline-light btn-lg animate__animated animate__fadeInUp" id="pos-btn">
                    Đặt Lịch Ngay
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slides/spa-slide-2.jpg">
                <div class="carousel-caption text-left">
                    <h2 class="display-4 slide-brand animate__animated animate__fadeInLeft">Made For Your</h2>
                    <hr id="bner">
                    <p class="title-slide animate__animated animate__fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed aliquam libero. Duis dictum tincidunt dui et interdum. Vivamus id elit nec lacus tincidunt efficitur eget eget justo. Aenean blandit mi quis ipsum interdum ullamcorper. Nunc eu arcu mattis, accumsan sem eu, tempor augue. Nunc maximus tincidunt sollicitudin.</p>
                    <a href="#bking-ser" role="button" class="btn btn-outline-light btn-lg animate__animated animate__fadeInUp" id="pos-btn">
                    Đặt Lịch Ngay
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slides/spa-slide-1.jpg">
                <div class="carousel-caption text-left">
                    <h2 class="display-4 slide-brand animate__animated animate__fadeInLeft">Unusual Look</h2>
                    <hr id="bner">
                    <p class="title-slide animate__animated animate__fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed aliquam libero. Duis dictum tincidunt dui et interdum. Vivamus id elit nec lacus tincidunt efficitur eget eget justo. Aenean blandit mi quis ipsum interdum ullamcorper. Nunc eu arcu mattis, accumsan sem eu, tempor augue. Nunc maximus tincidunt sollicitudin.</p>
                    <a href="#bking-ser" role="button" class="btn btn-outline-light btn-lg animate__animated animate__fadeInUp" id="pos-btn">
                    Đặt Lịch Ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--order_form-->
    <div class="container mt-5" id="bking-ser">
        <div class="col-md-12" id="booking-form">
            <form action="{{ url('booking') }}" method="post" class="booking-form-half" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <h2 style="color: #ff3366; font-family: 'Pacifico', cursive;" class="my-3">Đặt lịch online</h2>
                <div style="font-weight: bold;" class="mb-3">Vui lòng điền đầy đủ thông tin để đặt lích hoặc gọi cho Eluv Spa theo số điện thoại: 088.678.8967</div>
                <input type="text" name="booking_phone" id="phone" placeholder="Số điện thoại" required>
                <span class="mini-icon">
                    <i class="fas fa-phone"></i>
                </span>
                <select name="spa_name" id="select">
                    <option selected>Chọn chi nhánh</option>
                    <option value="Eluv Spa - Đà Nẵng">Eluv Spa - Đà Nẵng</option>
                </select>
                <span class="mini-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                <br>
                <select name="service_name" id="select">
                    <option selected>Chọn dịch vụ</option>
                    @foreach($service_booking as $ser_booking)
                        <option value="{{$ser_booking->Service_ID}}">{{$ser_booking->ServiceName}}</option>
                    @endforeach
                </select>
                <span class="mini-icon">
                    <i class="far fa-calendar-check"></i>
                </span>
                <br>
                <input type="hidden" name="user_hidden" value="
                    <?php
                        $user_id = Session::get('User_ID');
                        echo $user_id;
                    ?>
                " />
                <input type="text" name="booking_date" id="datepicker" required placeholder="yyyy/mm/dd">
                <span class="mini-icon">
                    <i class="far fa-calendar-check"></i>
                </span>
                <div class="d-flex justify-content-end">
                    <input type="submit" name="btn-booking" value="Đặt lịch" id="btn-booking">
                </div>  
            </form>
        </div>  
    </div>
    <!--Dịch vụ nổi bật -->
    <div class="container mt-5" data-aos="fade-up">
        <div class="col-12 d-flex justify-content-center">
            <h1 class="service-impor">Dịch vụ nổi bật</h1>
        </div>
        <div class="col-12">
            <div id="edit-hr">
                <hr class="hr-1">
            </div>
        </div>
    </div>
    <!-- Slider main container -->
    <div class="container mt-5" data-aos="fade-up" data-aos-delay="300">  
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @foreach($service as $ser)
                <div class="swiper-slide">
                    <div class="card">
                        <img class="card-img-top" src="img/service-img/{{$ser->Service_img}}" style="width:350px; height:233px">
                        <a href="{{ URL::to('eluvspa/dich-vu/'.$ser->Slug_service) }}" class="link-hidden-content">
                            <div class="hidden-content">
                                {!!$ser->SerContent!!}
                            </div>
                        </a>            
                    </div>
                    <div class="ser-name-index text-center pt-2">
                       <a href="{{ URL::to('eluvspa/dich-vu/'.$ser->Slug_service) }}">{{$ser->ServiceName}}</a>
                       <hr id="hr-optime">
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!--Giới thiệu-->
    <div style="padding: 0px !important" class="container-fluid mt-5">
        <div class="banner-gt">
            <div class="container-fluid py-4">
                <div style="padding: 0 150px" class="row">
                    <div class="col-12">
                        <h2 style="font-family: 'Lobster', cursive; color: #ff3366" class="text-center pb-4">Thay Đổi Làn Da - Thay Đổi Cuộc Sống</h2>
                    </div>
                    <div class="col-md-3" data-aos="fade-right" data-aos-duration="1000">
                        <div class="row">
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-1.png">
                            </div>
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Nâng niu và chăm sóc làn da</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Các dịch vụ chăm sóc da thư giãn, phục hồi</p>
                            </div>
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-2.png">
                            </div>
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Điều trị chuyên sâu</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Khắc phục các tổn thương trên bề mặt da: Mụn – Thâm – Sẹo</p>
                            </div>
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-3.png">
                            </div>
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Sản phẩm độc quyền thương hiệu Eluv Spa</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Chiết xuất từ các thành phầntự nhiên, an toàn, lành tính với mọi loại da</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="zoom-in" data-aos-duration="1000">
                        <img src="img/background/bg-detail.png" class="img-bg-detail">
                    </div>
                    <div class="col-md-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="row text-right">
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Thăm khám và soi da hoàn toàn miễn phí</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Lựa chọn phương pháp phù hợp với từng loại da</p>
                            </div>
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-4.png">
                            </div>
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Đội ngũ kỹ thuật viên giàu kinh nghiệm</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Chuyên nghiệp, ân cần, tận tâm phục vụ</p>
                            </div>
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-5.png">
                            </div>
                            <div class="title-gt col-sm-9">
                                <h4 style="font-family: 'Lobster', cursive;">Trang thiết bị hiện đại</h4>
                                <hr id="hr-gt">
                                <p style="font-weight: 500">Phòng dịch vụ sang trọng, dụng cụ đạt chuẩn y khoa</p>
                            </div>
                            <div class="icon-gt col-sm-3">
                                <img style="width: 55px; height: 55px" src="img/background/icon-6.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Sản phẩm nổi bật -->
    <div class="container mt-5" data-aos="fade-up">
        <div class="col-12 d-flex justify-content-center">
            <h1 class="service-impor">Sản phẩm nổi bật</h1>
        </div>
        <div class="col-12">
            <div id="edit-hr">
                <hr class="hr-1">
            </div>
        </div>
    </div>
    <div class="container mt-5" data-aos="fade-up" data-aos-delay="300">
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @foreach($products as $prod)
                <div class="swiper-slide">
                    <div class="card card-prod">
                        <img src="img/product/{{$prod->Prod_img}}" class="card-img-top" style="width:100%; height:225px;padding:7px 35px 0px 35px;">
                        <div class="card-body">
                            <h6 class="card-title cate-name">{{$prod->CateName}}</h6>
                            <a href="san-pham/{{$prod->Slug_prod}}" class="prod-name">{{$prod->ProdName}}</a>
                            <p class="price text-center pt-3">{{number_format($prod->ProdPrice)." "."₫"}}</p>
                            <div class="btn-cart text-center">
                                <a href="#" class="btn-buy">Mua ngay</a>
                                <a href="#" class="btn-add-cart">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Thời gian hoạt động-->
    <section id="time-act" class="mb-5">
        <div class="container" id="op-time">
            <div class="op-time-text">
                <h4 class="text-center">Thời gian hoạt động</h4>
                <hr id="hr-optime">
                <div class="mt-3 px-2 op-time-text-content">
                    <p>ELUV Spa bắt đầu làm việc từ 08:00 và nhận khách đợt cuối lúc 19:30 mỗi ngày (kể cả thứ 7 và Chủ nhật).</p>
                    <p class="mt-3"><b>ĐẶC BIỆT:</b> Vẫn hoạt động bình thường vào giờ nghỉ trưa, khách hàng có thể thoải mái booking mà không ngại ảnh hưởng đến công việc, học tập,…</p>
                    <p class="mt-4"><b>* LƯU Ý:</b> Khách hàng nên đặt lịch hẹn trước khi đến Gà Spa để được phục vụ tốt nhất. Khi có sự thay đổi về thời gian, Quý khách vui lòng báo trước 30 phút để tiện cho việc sắp xếp lịch hẹn.</p>
                </div>
            </div>
            <div class="op-time-img"></div>
        </div>
    </section>
@endsection