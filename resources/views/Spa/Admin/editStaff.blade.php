@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Sửa nhân viên</title>
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
                                <li class="breadcrumb-item"><a href="#">Quản lý nhân viên</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa nhân viên</li>
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
                    <h2 class="product">Sửa nhân viên</h2>
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
                    <form action="{{$Staffs->Staff_ID}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <label style="font-weight: 600; color: black; margin-top:5px;">Tên nhân viên</label>
                        <input type="text" name="FullName" class="form-control" value="{{$Staffs->FullName}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Email</label>
                        <input type="email" name="Email" class="form-control" value="{{$Staffs->Email}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ảnh nhân viên</label>
                        <p><img src="/img/staffs/{{$Staffs->Staff_img}}" style="width:200px; height:200px;"></p>
                        <input type="file" name="Staff_img" class="form-control">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ngày sinh</label>
                        <input type="date" name="Birthday" class="form-control" value="{{$Staffs->Birthday}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Vị trí</label>
                        <input type="text" name="Jobs" class="form-control" value="{{$Staffs->Jobs}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Địa chỉ</label>
                        <input type="text" name="Address" class="form-control" value="{{$Staffs->Address}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Lương/Tháng</label>
                        <input type="text" name="Salary" class="form-control" value="{{$Staffs->Salary}}">
                        <label style="font-weight: 600; color: black; margin-top:5px;">Ngày vào làm</label>
                        <input type="date" name="StartingDate" class="form-control" value="{{$Staffs->StartingDate}}">
                        <button type="submit" class="btn btn-success mt-3">THÊM NHÂN VIÊN</button>
                    </form>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a style="color: #ff3366;" href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">ELUV</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">ELUV</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
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
@endsection