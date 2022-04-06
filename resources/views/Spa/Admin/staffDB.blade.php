@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Quản lý nhân viên</title>
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
                  <li class="breadcrumb-item active" aria-current="page">Danh sách nhân viên</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div style="background-color: transparent" class="card">
            <!-- dark table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark">
                 @if(session('alert'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('alert')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Full name</th>
                    <th scope="col" class="sort" data-sort="email">Email</th>
                    <th scope="col" class="sort" data-sort="budget">Birthday</th>
                    <th scope="col" class="sort" data-sort="status">Address</th>
                    <th scope="col">Jobs</th>
                    <th scope="col">Salary</th>
                    <th scope="col" class="sort" data-sort="completion">Starting date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($Staffs as $staff)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a style="border: 2px solid #ff3366;" class="avatar rounded-circle mr-3">
                          <img src="/img/staffs/{{$staff->Staff_img}}">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$staff->FullName}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                    {{$staff->Email}}
                    </td>
                    <td class="budget">
                    {{$staff->Birthday}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$staff->Jobs}}</span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$staff->Address}}</span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$staff->Salary}}</span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$staff->StartingDate}}</span>
                      </span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="edit-staff/{{$staff->Staff_ID}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a class="dropdown-item" href="del-staff/{{$staff->Staff_ID}}"><i class="far fa-trash-alt"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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