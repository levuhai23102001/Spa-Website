@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Sửa sản phẩm</title>
@endsection

@section('pageContents')
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Quản lý sản phẩm</a></li>
                                <li class="breadcrumb-item active">Sửa sản phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt--6">
            <div class="card">
                <div class="col-12 pt-5">
                    <h2 class="product ml-2">Sửa sản phẩm</h2><span style="font-size: 15px; margin-left:10px; color: gray">{{$Products->ProdName}}</span>
                </div>
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
                <div class="card-body">
                    <form action="{{$Products->Prod_ID}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <label style="font-weight: 600; color: black; margin-top:5px;">Tên sản phẩm</label>
                        <input type="text" name="ProdName" class="form-control" id="name" value="{{$Products->ProdName}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Slug</label>
                        <input type="text" name="Slug" class="form-control" id="slug" value="{{$Products->Slug_prod}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Loại sản phẩm</label>
                        <select id="ProdCate" class="form-control" name="Category_ID">
                            <option >Chọn loại sản phẩm</option>
                            @foreach($Prod_Cate as $prdCate)
                                <option  
                                    @if($Products->Category_ID == $prdCate->Category_ID)
                                        {{"selected"}}
                                    @endif
                                value="{{$prdCate->Category_ID}}">{{$prdCate->CateName}}</option>
                            @endforeach
                        </select>
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ảnh sản phẩm</label>
                        <p><img src="/img/product/{{$Products->Prod_img}}" style="width:200px; height:200px;"></p>
                        <input type="file" name="Prod_img" class="form-control">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Mô tả sản phẩm</label>
                        <textarea name="ProdDecript" id="ProdDecript" class="form-control" rows="15">{{$Products->ProdDecript}}</textarea>
                        <label style="font-weight: 600; color: black; margin-top:5px;">Tình trạng</label>
                        <input type="text" name="Status" class="form-control" value="{{$Products->Status}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Giá tiền</label>
                        <input type="text" name="ProdPrice" class="form-control" value="{{$Products->ProdPrice}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Nhà sản xuất</label>
                        <input type="text" name="ProdCompany" class="form-control" value="{{$Products->ProdCompany}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ngày sản xuất</label>
                        <input type="date" name="NSX" class="form-control" value="{{$Products->NSX}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Hạn sử dụng</label>
                        <input type="date" name="HSD" class="form-control" value="{{$Products->HSD}}">
                        <button type="submit" class="btn btn-success mt-3">SỬA SẢN PHẨM</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('css')
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
@endsection

@section('script')
  <!--datatables.net-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/admin.js"></script>
  <!-- Slug js -->
  <script src="/js/admin/slug.js"></script>
  <!-- CKEditor -->
  <script src="/ckeditor/ckeditor.js"></script>
  <script>CKEDITOR.replace('ProdDecript');</script>
@endsection