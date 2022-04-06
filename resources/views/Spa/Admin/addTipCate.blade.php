@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Thêm loại tin tức</title>
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
                                <li class="breadcrumb-item"><a href="#">Quản lý tin tức</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm loại tin tức</li>
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
                    <h2 class="product">Thêm loại tin tức</h2>
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
                    <form action="add-tipCate" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <label style="font-weight: 600; color: black; margin-top:5px;">Loại tin tức</label>
                        <input type="text" name="TipsCateName" class="form-control" id="name">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Slug</label>
                        <input type="text" name="Slug_cateTips" class="form-control" id="slug">
                        <button type="submit" class="btn btn-success mt-3">THÊM LOẠI TIN TỨC</button>
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
@endsection