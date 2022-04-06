@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Quản lý đơn đặt hàng</title>
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
                                <li class="breadcrumb-item"><a href="#">Quản lý đơn đặt hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách đơn sản phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt--6">
          <div class="row">
            <div class="col">
            <!--datatables-->
              <div class="container mb-3 mt-3 pt-5" style="background-color: white; color: black; border-radius: 0.375rem; overflow-x: auto;">
                  <table class="table table-striped mydatatable" style="width: 100%; background-color: white;">
                      @if(session('alert'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{session('alert')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      @endif
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>Họ & Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Ngày đặt mua</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                          <tr>
                            <td>{{$order->Order_ID}}</td>
                            <td>{{$order->FirstName}} {{$order->LastName}}</td>
                            <td>{{$order->Email}}</td>
                            <td>{{$order->Address}}</td>
                            <td>{{$order->SĐT}}</td>
                            <td>{{$order->ProdName}}</td>
                            <td>{{$order->Quantity}}</td>
                            <td>{{$order->Order_total}} ₫</td>
                            <td>{{$order->Order_status}}</td>
                            <td>{{$order->Notes}}</td>
                            <td>{{$order->created_at}}</td>
                            <td class="text-right">
                              <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                                  <a class="dropdown-item" href="del-orderProd/{{$order->Order_ID}}"><i class="far fa-trash-alt"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
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
@endsection