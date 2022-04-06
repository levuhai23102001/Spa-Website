@extends('Spa.Giaodien.prodMaster')

@section('seo')
    <!-- SEO -->
    <link rel="canonical" href="http://localhost:8000/san-pham/{{$prod_detail->Slug_prod}}" />
@endsection

@section('title')
    <title>ELUV Spa - {{$prod_detail->ProdName}}</title>
@endsection

@section('products')
    <!--Product Title-->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <h3 class="title-h3">Sản Phẩm</h3>
                <a href="/eluvspa" class="tags">Trang chủ</a> / <a  href="{{url ('san-pham')}}" class="tags">Sản phẩm</a> / <a  href="{{$prod_detail->Slug_prod}}" class="tags">{{$prod_detail->ProdName}}</a>
            </div>
        </div>
    </div>
    <!--Product Detail-->
    <div class="container mt-5">
        <div class="row" style="background-color:white">
            <div class="col-md-5">
                <div class="img-prod">
                    <img src="/img/product/{{$prod_detail->Prod_img}}" style="width: 100%">
                </div>
            </div>
            <div class="col-md-7">
                <div class="info-prod">
                    <h3 class="mt-3">{{$prod_detail->ProdName}}</h3>
                    <hr id="hr-detail">
                    <form action="{{ url('eluvspa/save-cart') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <p style="font-size: 25px;font-weight:600; margin-top:20px">Giá: {{number_format($prod_detail->ProdPrice)." "."₫"}}</p>
                        <span style="font-size: 17px">Thương hiệu: <a href="#" style="color: #ff3366">{{$prod_detail->ProdCompany}}</a></span>
                        <p style="font-size: 17px; margin-top: 1rem;">Tình trạng: <span style="color: #188038">{{$prod_detail->Status}}</span></p>
                        <span style="font-size: 17px">Mã SP: {{$prod_detail->Prod_ID}}</span>
                        <p style="font-size: 17px; margin-top: 1rem;">Danh mục: <a href="kem-duong-da" style="color: #ff3366">{{$prod_detail->CateName}}</a></p>
                        <span style="font-size: 17px;">Số lượng:
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus"  data-type="minus" data-field="">
                                    <i class="fas fa-minus fa-sm"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="input-number" value="1" min="1">
                            <input type="hidden" name="prodID_hidden" value="{{$prod_detail->Prod_ID}}">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus" data-type="plus" data-field="">
                                    <i class="fas fa-plus fa-sm"></i>
                                </button>
                            </span>
                        </span>
                        <div class="btn-cart-detail my-4">
                            <button type="submit" class="btn-detail-buy">Mua ngay</button>
                            <button type="submit" class="btn-detail-add">Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Decriptions -->
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="info" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" style="color:black">Mô tả chi tiết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="decript" data-toggle="tab" href="#decript" role="tab" aria-controls="decript" aria-selected="false" style="color:black">Đánh giá</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                <p>{!!$prod_detail->ProdDecript!!}</p>
            </div>
            <div class="tab-pane fade" id="decript" role="tabpanel" aria-labelledby="decript">...</div>
        </div>
    </div>
    <!-- Bình luận và đánh giá -->
    <div class="container mt-5">
        <div class="fb-comments" data-href="http://localhost:8000/san-pham/{{$prod_detail->Slug_prod}}" data-width="" data-numposts="5"></div>
    </div>
    <!-- Sản phẩm liên quan -->
    <div class="container mt-5">
        <div class="col-12">
            <div class="title-link">
                <h3 style="font-family: 'Lobster', cursive;">Sản phẩm liên quan</h3>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row">
            @foreach($prod_related as $related)
                <div class="col-md-4">
                    <div class="card card-prod">
                        <img src="/img/product/{{$related->Prod_img}}" class="card-img-top" style="width:100%; height:225px;padding:7px 35px 0px 35px;">
                        <div class="card-body">
                            <h6 class="card-title cate-name">{{$related->CateName}}</h6>
                            <a href="{{$related->Prod_ID}}" class="prod-name">{{$related->ProdName}}</a>
                            <p class="price text-center pt-3">{{$related->ProdPrice}}</p>
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
@endsection

@section('js')
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
