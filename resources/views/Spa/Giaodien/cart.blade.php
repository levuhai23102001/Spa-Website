@extends('Spa.Giaodien.master')

@section('title')
    <title>ELUV Spa - Giỏ Hàng</title>
@endsection

@section('content')
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('eluvspa') }}" title="Trang chủ">
                <img style="width: 150px; height: 75px" src="/logo/ELUV_1.gif">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i style="color: white" class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('eluvspa')}}">Trang Chủ</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('eluvspa/dich-vu')}}">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('san-pham')}}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('eluvspa/tips')}}">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('eluvspa/lien-he')}}">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('eluvspa/gio-hang')}}" title="Giỏ hàng">
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
    <!-- title -->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <h3 class="title-h3">Giỏ Hàng</h3>
            </div>
        </div>
    </div>                     
    <!-- Shopping Cart -->
    <section class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <div class="card-body">
                        <?php
                            $content = Cart::content();
                        ?>
                    @foreach($content as $cnt)
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <a href="{{ URL::to('san-pham/' .$cnt->id) }}">
                                        <img style="width:150px; height:173px; padding:5px 0;" class="img-fluid" src="/img/product/{{$cnt->options->image}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-9">
                                            <h5>{{$cnt->name}}</h5>
                                            <p class="my-3 text-muted text-uppercase small">Nhãn hiệu: {{$cnt->options->brand}}</p>
                                            <p class="mb-2 text-muted text-uppercase small">Tình trạng: <span style="color:#188038; font-weight:500">{{$cnt->options->status}}</span></p>
                                        </div>
                                        <div class="pr-3">
                                            <form action="{{ url('eluvspa/update-cart') }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus"  data-type="minus" data-field="">
                                                        <i class="fas fa-minus fa-sm"></i>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="qty_cart" class="input-number" value="{{$cnt->qty}}" min="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus" data-type="plus" data-field="">
                                                        <i class="fas fa-plus fa-sm"></i>
                                                    </button>
                                                </span>
                                                <input type="hidden" value="{{$cnt->rowId}}" name="rowId_prod">
                                                <input style="padding: 10px" type="submit" value="Cập nhập" name="update_qty" class="btn btn-default btn-sm mt-3 ml-3">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mt-3 pl-3">
                                            <a style="color: #ff3366 !important" href="delete-to-cart/{{$cnt->rowId}}" type="button" class="card-link-secondary small text-uppercase mr-3">
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
                        <p class="text-primary mb-0" style="color: #ff3366 !important"><i class="fas fa-info-circle mr-1"></i> Đừng trì hoãn việc mua hàng, 
                        thêm các mặt hàng vào giỏ hàng của bạn không có nghĩa là đặt trước chúng.</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-4">Giao hàng dự kiến</h5>
                        <p class="mb-0">Thời gian giao hàng 3 ngày kể từ ngày đặt hàng</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-4">Các hình thức thanh toán</h5>
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
            <div class="col-lg-4">
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
                        <?php
                            $user_id = Session::get('User_ID');
                            if($user_id){
                             
                        ?>    
                            <a href="{{ url('thanh-toan')}}" style="background-color: #ff3366 !important" type="button" class="btn btn-primary btn-block waves-effect waves-light">
                                Thanh toán đơn hàng
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="{{ url('eluvspa/dang-nhap')}}" style="background-color: #ff3366 !important" type="button" class="btn btn-primary btn-block waves-effect waves-light">
                                Thanh toán đơn hàng
                            </a>
                            <?php
                        }    
                            ?>
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
    </section>
@endsection

@section('css')
    <!--MDB CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
@endsection

@section('js')
    <!--MDB JS-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script>
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){
                    
                    // Stop acting like a button
                    e.preventDefault();
                    // Get the field name
                    var quantity = parseInt($('#quantity').val());
                    
                    // If is not undefined
                        
                        $('#quantity').val(quantity + 1);

                    
                        // Increment
                    
            });

            $('.quantity-left-minus').click(function(e){
                    // Stop acting like a button
                e.preventDefault();
                    // Get the field name
                var quantity = parseInt($('#quantity').val());
                    
                    // If is not undefined
                
                        // Increment
                if(quantity>1){
                    $('#quantity').val(quantity - 1);
                }
            });
                
        });
    </script>
@endsection