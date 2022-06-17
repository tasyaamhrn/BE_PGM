@extends('layouts.app')
@section('content')
<!-- Page -->
@section('page')

<div class="col-12 align-self-center">
  <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Product</h4>
  <div class="d-flex align-items-center">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
        <li class="breadcrumb-item text-muted active" aria-current="page">Product</li>
      </ol>
    </nav>
  </div>
</div>
@endsection
<!-- End Page -->
<!-- Modal Add Employee -->
<!-- Button Modal-->
<button type="button" id="add" class=" btn btn-rounded" data-toggle="modal" data-target="#warning-header-modal">Add Product</button>
<!-- End Button Modal -->
<div id="warning-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div id="modals" class="modal-header modal-colored-header ">
        <h4 class="modal-title" id="warning-header-modalLabel">Add Product
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form role="form text-left" method="post" action="{{ route('meeting.store') }}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tanggal</label>
            <div>
              <input type="date" class="form-control" name="tanggal" placeholder="tanggal">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Judul</label>
            <div>
              <input type="text" class="form-control" name="judul" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Notulensi</label>
            <div>
              <textarea class="form-control" name="notulensi" placeholder="Notulensi"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Notulis</label>
            <div>
              <input type="text" readonly="readonly" class="form-control" name="notulis" value="{{$name}}">
            </div>
          </div>

          <div class="form-group text-center">
            <button id="btn" type="submit" class="btn btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Add Employee -->
<br>
<br>
<!-- Table Employee -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product Table</h4>

        <div class="table-responsive">
          <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead>
              <tr>
                <th>Blok</th>
                <th>No.Kavling</th>
                <th>Type</th>
                <th>Luas(m<sup>2</sup>)</th>
                <th>Price</th>
                <th>Status</th>
                <th>Tanah Lebih</th>
                <th>Discount(%)</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($product as $p)
              <tr>
                <td>{{$p->blok}}</td>
                <td>{{$p->no_kavling}}</td>
                <td>{{$p->type}}</td>
                <td>{{$p->luas_tanah}}</td>
                <td>@currency($p->price)</td>
                <td>{{$p->status}}</td>
                <td>{{$p->tanah_lebih}}</td>
                <td>{{$p->discount}}</td>
                <td><img src="{{asset($p->image )}}" height="40px" width="40px" />
                {{-- <td>
                  {{$c->departmen->name}}
                  <!-- @foreach ($department as $dep)
                  @if($dep->id == $c->dept_id)
                  {{$dep->name}}
                  @endif
                  @endforeach -->

                </td> --}}
                <td>
                  <a id="edit" class="btn btn-circle btn-lg btn-warning edit" type="button" data-toggle="modal" data-target="#editModal{{$p->id }}">
                    <span class="btn-label"><i class="far fa-edit"></i></span>
                  </a>
                  <form method="post" action="{{ route('meeting.destroy', $p->id) }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-circle btn-lg btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">
                      <i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              <!-- Modal Edit -->
              <div id="editModal{{$p->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div id="modals" class="modal-header modal-colored-header ">
                      <h4 class="modal-title" id="warning-header-modalLabel">Edit Meeting
                      </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="post" action="{{ route('meeting.update', $p->id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Tanggal</label>
                          <div>
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="{{$p->tanggal}}">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Judul</label>
                            <div>
                              <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{$p->judul}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Notulensi</label>
                            <div>
                              <input type="text" class="form-control" name="notulensi" placeholder="Notulensi" value="{{$p->notulensi}}">
                            </div>
                          </div>
                        <div class="form-group text-center">
                          <button id="btn" type="submit" class="btn btn-block">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- End Modal Edit -->
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Table Employee -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
@endsection
