@extends('Spa.Giaodien.prodMaster')

@section('title')
    <title>ELUV Spa - Sản phẩm</title>
@endsection

@section('products')
    <!--Product-->
    <div style="margin-top: 150px" class="container">
        <div class="col-12">
            <div class="title-link">
                <h3 class="title-h3">Sản phẩm</h3>
                <a href="/eluvspa" class="tags">Trang chủ</a> / <a  href="{{url('san-pham')}}" class="tags">Sản phẩm</a>
                / <a  href="#" class="tags">Tìm kiếm</a>
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
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"aria-label="Search" name="keyword" value="{{$keyword}}">
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                <ul style="border-right: 1px solid #8c8286;" class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ url('san-pham/kem-duong-da') }}">Kem dưỡng da</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('san-pham/kem-chong-nang') }}">Kem chống nắng</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('san-pham/serum-tri-mun') }}">Serum trị mụn</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('san-pham/sua-rua-mat') }}">Sữa rửa mặt</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('san-pham/nuoc-hoa') }}">Nước hoa</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                @forelse($products as $prod)

                @empty

                <p style="margin:auto; font-size:30px">Không tìm thấy sản phẩm "<span>{{$keyword}}</span>"</p>

                @endforelse

                @foreach($products as $prod)
                    <div class="col-md-4 mt-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="card card-prod">
                            <img src="/img/product/{{$prod->Prod_img}}" class="card-img-top" style="width:100%; height:225px; padding:20px 35px 0px 35px;">
                            <div class="card-body">
                                <h6 class="card-title cate-name">{{$prod->CateName}}</h6>
                                <a href="{{ URL::to('san-pham/'.$prod->Slug_prod) }}" class="prod-name">{{$prod->ProdName}}</a>
                                <p class="price text-center pt-3">{{number_format($prod->ProdPrice)." "."₫"}}</p>
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
                    {{$products->render('Spa.Giaodien.pagination')}}
                </div>
            </div>
        </div>
    </div>
@endsection