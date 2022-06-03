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
<!-- Button trigger modal -->
<button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
  <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
</button>
<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" data-backdrop="false" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add Employee</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form text-left" method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email</label>
            <div>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <div>
              <input type="password" class="form-control" name="password" placeholder="password">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Name</label>
            <div>
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Address</label>
            <div>
              <textarea class="form-control" name="address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Phone</label>
            <div>
              <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Avatar</label>
            <div>
              <input type="file" class="form-control" name="avatar">
              <label><b>*Jika tidak di ganti kosongkan saja</b></label>
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Departemen</label>
            <div>
              <select name='dept_id' class='form-control'>
                @foreach($data_departemen as $dept)
                <option hidden value="">
                  <center>-- Pilih --</center>
                </option>
                <option value="{{$dept->id}}">{{$dept->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
