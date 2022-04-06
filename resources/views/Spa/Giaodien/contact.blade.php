@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Liên Hệ</title>
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
                        <a class="nav-link" href="dich-vu">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('san-pham') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tips">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lien-he">Liên Hệ</a>
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
                            echo '<a href="dang-xuat" class="dropdown-item">';
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
    <!-- Contact Form -->
    <section id="contact-form">
        <div class="container" id="c-contact">
            <div class="contactinfo">
                <h2 style="font-family: 'Pacifico', cursive; color: white">liên hệ</h2>
                <ul class="info">
                    <li>
                        <a href="#"><i class="fas fa-map-marker-alt fa-lg"></i> Ngũ Hành Sơn, Đà Nẵng, Việt Nam</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-phone-alt fa-lg"></i> Hotline: (088) 678 8967</a>
                    </li>
                    <li>
                        <a href="mailto:levuhai2310@gmail.com"><i class="fas fa-envelope fa-lg"></i> levuhai2310@gmail.com</a>
                    </li>
                </ul>
                <ul class="sci">
                    <li>
                        <a class="f-facebook" href="#" target="_blank">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="f-instagram" href="#" target="_blank">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="f-twitter" href="#" target="_blank">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="f-youtube" href="#" target="_blank">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="contactForm">
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

                    @if(session('alert'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('alert')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <h2 style="  font-family: 'Pacifico', cursive;">Gửi Tin nhắn</h2>
                <form action="{{ url('eluvspa/lien-he') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="formBox">
                        <div class="inputBox w50">
                            <input type="text" name="FullName" required>
                            <span>Họ & Tên</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="Address" required>
                            <span>Địa Chỉ</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="Email" required>
                            <span>Email</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="SĐT" required>
                            <span>Số Điện Thoại</span>
                        </div>
                        <div class="inputBox w100">
                            <textarea name="Content" required></textarea>
                            <span>Viết tin nhắn ở đây...</span>
                        </div>
                        <div class="inputBox w100">
                            <input type="submit" value="Gửi">                   
                        </div>
                    </div>
                </form>
            </div>                  
        </div>
    </section>
@endsection