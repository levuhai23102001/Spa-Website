@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Thanh Toán</title>
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
                            echo '<a href="eluvspa/ho-so" class="dropdown-item">';
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
    <!-- Check Out -->
    <section class="container mb-5" style="margin-top: 175px">
        <form action="{{url('save-checkout')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card wish-list pb-1">
                        <div class="card-body">
                            <h5 class="mb-2">Chi tiết thanh toán</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="md-form md-outline mb-0 mb-lg-4">
                                            <input type="text" id="firstName" name="FirstName" class="form-control mb-0 mb-lg-2" required>
                                            <label for="firstName">Họ</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="lastName" name="LastName" class="form-control" required>
                                            <label for="lastName">Tên</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Email address -->
                                <div class="md-form md-outline" style="margin-top: 0px">
                                    <input type="email" name="Email" id="form19" class="form-control" required>
                                    <label for="form19">Email</label>
                                </div>
                                <!-- Address -->
                                <div class="md-form md-outline mt-0">
                                    <input type="text" name="Address" id="form14" placeholder="Nhập địa chỉ hiện tại của bạn" class="form-control" required>
                                    <label for="form14">Địa chỉ</label>
                                </div>
                                <!-- Phone -->
                                <div class="md-form md-outline">
                                    <input type="text" name="SĐT" id="form18" class="form-control" required>
                                    <label for="form18">Số điện thoại</label>
                                </div>
                                <!-- Additional information -->
                                <div class="md-form md-outline">
                                    <textarea id="form76" name="Notes" class="md-textarea form-control" rows="4"></textarea>
                                    <label for="form76">Ghi chú</label>
                                </div>
                                <!-- payment method -->
                                <h5 class="mb-2">Phương thức thanh toán</h5>
                                <div class="custom-control custom-radio">
                                    <input id="atm" name="paymentMethod" type="radio" class="custom-control-input" value="1" checked="" required="">
                                    <label class="custom-control-label" for="atm">Thẻ tín dụng hoặc thẻ ghi nợ</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="handcash" name="paymentMethod" type="radio" class="custom-control-input" value="2" required="">
                                    <label class="custom-control-label" for="handcash">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="3" required="">
                                    <label class="custom-control-label" for="paypal">Thanh toán qua PayPal</label>
                                </div>
                                <div class="mt-4">
                                    <img class="mr-2" width="45px"
                                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                    alt="Visa">
                                    <img class="mr-2" width="45px"
                                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                    alt="American Express">
                                    <img class="mr-2" width="45px"
                                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                    alt="Mastercard">
                                    <img class="mr-2" width="50px" src="/img/paypal.png" alt="PayPal acceptance mark">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cart-->
                    <div class="col-lg-6">
                        <div class="card wish-list mb-3">
                            <div class="card-body">
                                <?php
                                    $content = Cart::content();
                                ?>
                                @foreach($content as $cnt)
                                <div class="row mb-4">
                                    <div class="col-md-5 col-lg-4 col-xl-4">
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <a href="{{ URL::to('san-pham/' .$cnt->id) }}">
                                                <img style="width:150px; height:173px; padding:5px 0;" class="img-fluid" src="/img/product/{{$cnt->options->image}}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-8 col-xl-8">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div class="col-md-9">
                                                    <h5 style="font-size:15px">{{$cnt->name}}</h5>
                                                        <p class="my-3 text-muted text-uppercase small">Nhãn hiệu: {{$cnt->options->brand}}</p>
                                                        <p class="mb-2 text-muted text-uppercase small">Tình trạng: <span style="color:#188038; font-weight:500">{{$cnt->options->status}}</span></p>
                                                </div>
                                                <div class="pr-3">x{{$cnt->qty}}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mt-3 pl-3">
                                                    <a style="color: #ff3366 !important" href="eluvspa/delete-to-cart/{{$cnt->rowId}}" type="button" class="card-link-secondary small text-uppercase mr-3">
                                                        <i class="fas fa-trash-alt mr-1"></i> Xóa sản phẩm 
                                                    </a>
                                                </div>
                                                <p class="mb-0 pr-3"><span><strong>
                                                    <?php
                                                        $subTotal = $cnt->price * $cnt->qty;
                                                        echo number_format($subTotal)." "."₫";
                                                    ?>
                                                </strong></span></p>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <hr class="mb-4">
                                @endforeach
                            </div>
                        </div>           
                        <!-- Cart Total -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="mb-3">Tổng tiền</h5>
                                    <ul class="list-group list-group-flush">
                                        <li style="font-family: 'Poppins', sans-serif" class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Tổng giá:
                                            <span>{{ Cart::subTotal()." "."₫" }}</span>
                                        </li>
                                        <li style="font-family: 'Poppins', sans-serif" class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Phí Ship:
                                            <span>{{ Cart::tax()." "."₫" }}</span>
                                        </li>
                                        <li style="font-family: 'Poppins', sans-serif" class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Tổng tiền:</strong>
                                            </div>
                                            <span><strong>{{ Cart::total()." "."₫" }}</strong></span>
                                        </li>
                                    </ul>
                                    <button style="background-color: #ff3366 !important" type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                        Thanh toán đơn hàng
                                    </button>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"
                                    aria-expanded="false" aria-controls="collapseExample1">
                                    Nhập mã giảm giá (Nếu có)
                                    <span><i class="fas fa-chevron-down pt-1"></i></span>
                                </a>
                                <div class="collapse" id="collapseExample1">
                                    <div class="mt-3">
                                        <div class="md-form md-outline mb-0">
                                            <input type="text" id="discount-code1" class="form-control font-weight-light"
                                                placeholder="Nhập mã giảm giá">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
<!--Section: Block Content-->
@endsection

@section('css')
    <!--MDB CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
@endsection

@section('js')
    <!--MDB JS-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
@endsection