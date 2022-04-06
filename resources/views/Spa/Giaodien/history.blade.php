@extends('Spa.Giaodien.profileMaster')

@section('profile')
    <div class="container-fluid mb-5" style="margin-top: 250px; padding:0px 100px">
        <!-- Page content -->
        <div class="row">
          <div class="col-md-2 mt--6"> 
            <ul style="border-right: 1px solid #8c8286;" class="list-group list-group-flush">
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('eluvspa/ho-so') }}"><i class="fas fa-user-circle"></i> Hồ sơ của tôi</a>
              </li>
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('eluvspa/lich-su') }}" class="act"><i class="fas fa-history"></i> Lịch sử</a>
              </li>
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('dang-xuat') }}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
              </li>
            </ul>
        </div>
        <div class="col-md-10 mt--6">
            <!-- lịch sử mua hàng -->
            <div class="card-header border-0" style="background-color: #1c345d;">
                <h3 class="mb-0" style="color:white !important">Lịch Sử Mua Hàng</h3>
            </div>
            <div style="background-color: transparent" class="card">
                <!-- dark table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Mã Giao dịch</th>
                                    <th scope="col">Họ & Tên</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ghi chú</th>
                                </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->Order_ID}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->FirstName}} {{$order->LastName}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->ProdName}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->Quantity}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->Order_total}} ₫</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">{{$order->Order_status}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$order->Notes}}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- lịch sử sử dụng dịch vụ -->
            <div class="card-header border-0" style="background-color: #1c345d;">
                <h3 class="mb-0" style="color:white !important">Lịch Sử đăng ký dịch vụ</h3>
            </div>
            <div style="background-color: transparent" class="card">
                <!-- dark table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Mã Giao dịch</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tên dịch vụ</th>
                                <th scope="col">Chi nhánh</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày đăng ký</th>
                                </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($booking as $bking)
                            <tr>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->Booking_ID}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->SĐT}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->ServiceName}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->Branch}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->PriceOneTime}} ₫</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">{{$bking->Status}}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$bking->Date_Bking}}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
