@extends('layouts.app')
@section('content')
  @section('pages')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Employee</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Employee</h6>
  </nav>
  @endsection
    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
      <a class="btn bg-gradient-dark mb-0" href="javascript:;">
        <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Employee Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Avatar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Departemen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($data_employee as $employee)
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$employee->email}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$employee->name}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$employee->address}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$employee->phone}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <img src="{{ asset('avatar/'.$employee->avatar) }}" class="avatar avatar-sm me-3" alt="user1">
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$employee->dept_name}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold"></span>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
@endsection