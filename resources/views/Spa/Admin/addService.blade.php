@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Thêm dịch vụ</title>
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
                                <li class="breadcrumb-item"><a href="#">Quản lý dịch vụ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm dịch vụ</li>
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
                    <h2 class="product">Thêm dịch vụ</h2>
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
                    <form action="add-sers" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <label style="font-weight: 600; color: black; margin-top:5px;">Tên dịch vụ</label>
                        <input type="text" name="ServiceName" class="form-control" id="name">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Slug</label>
                        <input type="text" name="Slug_service" class="form-control" id="slug">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ảnh dịch vụ</label>
                        <input type="file" name="Service_img" class="form-control">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Nội dung & mô tả dịch vụ</label>
                        <textarea name="SerContent" id="SerContent" class="form-control" rows="15"></textarea>
                        <label style="font-weight: 600; color: black; margin-top:5px;">Giá 1 lần</label>
                        <input type="text" name="PriceOneTime" class="form-control">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Giá trọn gói</label>
                        <input type="text" name="AllInOne" class="form-control">
                        <button type="submit" class="btn btn-success mt-3">THÊM DỊCH VỤ</button>
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
  <script src="/assets/js/admin.js"></script>
  <!-- Slug js -->
  <script src="/js/admin/slug.js"></script>
  <!-- CKEditor -->
  <script src="/ckeditor/ckeditor.js"></script>
  <script>CKEDITOR.replace('SerContent');</script>
@endsection