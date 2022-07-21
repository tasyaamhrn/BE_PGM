@extends('layouts.app')
@section('content')
@section('page')
    <div class="col-12 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard </h4>

    </div>
@endsection
<div class="container-fluid">
    <!-- ********************* -->
    <!-- Start First Cards -->
    <!-- ********************* -->
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                {{$memo}}
                            </h2>
                            <span
                                class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">Received</span>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Memo</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                            {{$finished_memo}}
                        </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Finished Memo
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                {{$total_complaints}}
                            </h2>
                            <span
                                class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">Received</span>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Complaint</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="inbox"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                            {{$finished_complaints}}
                        </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Finished Complaint
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart</h4>
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div>

    </div>
</div>
    @endsection
