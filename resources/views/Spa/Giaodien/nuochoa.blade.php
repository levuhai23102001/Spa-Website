@extends('Spa.Giaodien.prodMaster')

@section('title')
    <title>ELUV Spa - Sản phẩm ●︎ Nước hoa</title>
@endsection

@section('products')
    <!--Product-->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <h3 class="title-h3">Sản Phẩm</h3>
                <a href="/eluvspa" class="tags">Trang chủ</a> / <a  href="{{url('san-pham')}}" class="tags">Sản phẩm</a> / <a  href="nuoc-hoa" class="tags">Nước hoa</a>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <!-- Search form -->
        <div class="row mb-5">
            <div class="col-md-3"></div>
            <div class="col-md-7">  
                <form action="{{url('san-pham/tim-kiem')}}" method="post" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <i style="color: #ff3366" class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"aria-label="Search" name="keyword">
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                <ul style="border-right: 1px solid #8c8286;" class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="kem-duong-da">Kem dưỡng da</a>
                    </li>
                    <li class="list-group-item">
                        <a href="kem-chong-nang">Kem chống nắng</a>
                    </li>
                    <li class="list-group-item">
                        <a href="serum-tri-mun">Serum trị mụn</a>
                    </li>
                    <li class="list-group-item">
                        <a href="sua-rua-mat">Sữa rửa mặt</a>
                    </li>
                    <li class="list-group-item">
                        <a href="nuoc-hoa" class="act">Nước hoa</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                @foreach($nuochoa as $nh)
                    <div class="col-md-4 col-sm-4 my-2">
                        <div class="card card-prod">
                            <img src="/img/product/{{$nh->Prod_img}}" class="card-img-top" style="width:100%; height:225px; padding:35px 35px 0px 35px;">
                            <div class="card-body">
                                <h6 class="card-title cate-name">{{$nh->CateName}}</h6>
                                <a href="{{$nh->Slug_prod}}" class="prod-name">{{$nh->ProdName}}</a>
                                <p class="price text-center pt-3">{{number_format($nh->ProdPrice)." "."₫"}}</p>
                                <div class="btn-cart text-center">
                                    <a href="#" class="btn-buy-sp">Mua ngay</a>
                                    <a href="#" class="btn-add-cart-sp">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                 <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{$nuochoa->render('Spa.Giaodien.pagination')}}
                </div>
            </div>
        </div>
    </div>
@endsection
