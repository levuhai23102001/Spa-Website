@extends('Spa.Giaodien.profileMaster')

@section('profile')
    <div class="container-fluid mb-5" style="margin-top: 250px; padding:0px 100px">
        <!-- Page content -->
        <div class="row">
          <div class="col-md-2 mt--6"> 
            <ul style="border-right: 1px solid #8c8286;" class="list-group list-group-flush">
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('eluvspa/ho-so') }}" class="act"><i class="fas fa-user-circle"></i> Hồ sơ của tôi</a>
              </li>
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('eluvspa/lich-su') }}"><i class="fas fa-history"></i> Lịch sử</a>
              </li>
              <li class="list-group-item font-weight-bold poppin">
                <a href="{{ url('dang-xuat') }}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
              </li>
            </ul>
          </div>
          <div class="col-md-10 mt--6">
            <div class="row">
              <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                  <img style="width: 100%; height: 193px;" src="/img/background/Cyberpunk.jpg" class="card-img-top">
                  <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                      <div class="card-profile-image">
                        <a href="#">
                          <img style="width: 134px; height: 134px;" src="/logo/Artwork_Middle_Nier.gif" class="rounded-circle">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                      <a href="#" class="btn btn-sm btn-info  mr-4 ">Kết nối</a>
                      <a href="#" class="btn btn-sm btn-default float-right">tin nhắn</a>
                    </div>
                  </div>
                  <div class="card-body pt-3">
                    <div class="text-center">
                      <h5 class="h3">
                          {{$profile_user->LastName}}<span class="font-weight-light"></span>
                      </h5>
                      <div class="h5 font-weight-700">
                      {{$profile_user->City}}, {{$profile_user->Country}}
                        <i class="ni location_pin mr-2"></i>
                      </div>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>Music Producer - ELUV Team
                      </div>
                      <div>
                        <i class="ni education_hat mr-2"></i><span style="color: black;">Vietnam - Korea University of Information and Communication Technology</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 order-xl-1">
                <div class="card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-md-9">
                        <h3 class="mb-0">Hồ sơ của tôi</h3>
                      </div>
                      <div class="col-md-3 d-flex justify-content-end">
                        <a href="ho-so/chinh-sua/{{$profile_user->User_ID}}" class="btn btn-sm btn-success  mr-4 ">Chỉnh sửa</a>
                      </div>
                    </div>
                  </div>
                          @if(session('alert'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('alert')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <h6 class="heading-small text-muted mb-4" style="color: black !important">Thông tin tài khoản</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Tên đăng nhập</label>
                              <input type="text" name="Username" id="input-username" class="form-control" placeholder="Tên đăng nhập" value="{{$profile_user->Username}}">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-email">Địa chỉ Email</label>
                              <input type="email" name="Email" id="input-email" class="form-control" placeholder="Email" value="{{$profile_user->Email}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Họ</label>
                              <input type="text" name="FirstName" id="input-first-name" class="form-control" placeholder="Họ" value="{{$profile_user->FirstName}}">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Tên</label>
                              <input type="text" name="LastName" id="input-last-name" class="form-control" placeholder="Tên" value="{{$profile_user->LastName}}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <!-- Address -->
                      <h6 class="heading-small text-muted mb-4" style="color: black !important">Thông tin liên hệ</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-address">Địa chỉ</label>
                              <input id="input-address" name="Address" class="form-control" placeholder="Địa chỉ" value="{{$profile_user->Address}}" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-city">Thành phố</label>
                              <input type="text" name="City" id="input-city" class="form-control" placeholder="Thành phố" value="{{$profile_user->City}}">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-country">Quốc gia</label>
                              <input type="text" name="Country" id="input-country" class="form-control" placeholder="Quốc gia" value="{{$profile_user->Country}}">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-country">Postal code</label>
                              <input type="number" name="PostalCode" id="input-postal-code" class="form-control" placeholder="Postal code" value="{{$profile_user->PostalCode}}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                      <!-- Description -->
                      <h6 class="heading-small text-muted mb-4" style="color: black !important">Ghi chú</h6>
                      <div class="pl-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Ghi chú</label>
                          <textarea rows="4" name="AboutMe" class="form-control" placeholder="Viết một vài thứ về bạn ...">{!!$profile_user->AboutMe!!}</textarea>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
@endsection
