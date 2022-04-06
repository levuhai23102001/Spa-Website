@extends('Spa.Giaodien.master')

@section('seo')
    <!-- SEO -->
    <link rel="canonical" href="http://localhost:8000/eluvspa/tips/{{$tip_Detail->Slug_tips}}" />
@endsection

@section('title')
    <title>ELUV Spa - {{$tip_Detail->TipsTitle}}</title>
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
                        <a class="nav-link active" href="{{ url('eluvspa/tips') }}">Tips</a>
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
                            echo '<a href="dang-xuat" class="dropdown-item">';
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
    <!--Service Title-->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <a href="/eluvspa" class="tags">Trang chủ</a> / <a  href="{{url ('eluvspa/tips')}}" class="tags">Tips</a>
                <h3 class="title-h3 mt-3">{{$tip_Detail->TipsTitle}}</h3>
            </div>
        </div>
        <hr class="type_4 mt-4">
    </div>
    <!-- btn-like & Share -->
    <div class="container mt-3">
        <p style="font-size: 13px; color: #656565;">Ngày đăng: {{$tip_Detail->created_at}}</p>
        <div class="fb-like" data-href="http://localhost:8000/eluvspa/tips/{{$tip_Detail->Slug_tips}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
    </div>
    <!-- Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                {!!$tip_Detail->TipsContent!!}
            </div>
        </div>
    </div>
    <!-- btn-like & Share -->
    <div class="container mt-4">
        <div class="fb-like" data-href="http://localhost:8000/eluvspa/tips/{{$tip_Detail->Slug_tips}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
    </div>
    <!-- Bình luận và đánh giá -->
    <div class="container my-5">
        <div class="fb-comments" data-href="http://localhost:8000/eluvspa/tips/{{$tip_Detail->Slug_tips}}" data-width="" data-numposts="5"></div>
    </div>

    <!--Bài viết liên quan -->
    <div class="container mt-5">
        <div class="col-12">
            <div class="title-link">
                <h3 style="font-family: 'Lobster', cursive;">Bài viết liên quan</h3>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row">
        @foreach($related_tip as $related)
            <div class="col-md-4 mb-4">
                <div class="card card-tips">
                    <img src="/img/tips/{{$related->Tips_img}}" class="card-img-top" style="width:348px; height:232px">
                    <div class="card-body">
                        <h6 class="card-title cate-tips">{{$related->TipsCateName}}</h6>
                        <a href="{{ URL::to('eluvspa/tips/'.$related->Slug_tips) }}" class="tips-name">{{$related->TipsTitle}}</a>
                        <div class="card-title tip-content mt-2">{!!$related->TipsContent!!}</div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>       
    </div>
@endsection

@section('js')
@endsection
