@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Sales</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Linkedin</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection


@section('content')

<!-- Overview -->
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row">
                <div class="round round-lg align-self-center round-info"><i class="ti-user"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0 font-light">250</h3>
                    <h5 class="text-muted m-b-0">Total Linkedin</h5></div>
            </div>
        </div>
    </div>
</div>

<!-- Start Form -->
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Linkedin Form</h4>
        </div>
        <div class="card-body">
            <form action="#" class="form-horizontal">
                <div class="form-body">
                    <h3 class="box-title">Person Info</h3>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" >
                                    <small class="form-control-feedback"> Nama Lengkap </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Position</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> CEO, CMO, Marketing, Account Executive, etc </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Company</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> PT. Mamkur, Gojek, MonsterAR etc </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Gender</label>
                                <div class="col-md-9">
                                    <select class="form-control custom-select">
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                    <small class="form-control-feedback"> Select Gender. </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> Link Account </small> </div>
                            </div>
                        </div>
                        
                    </div>                    
                    <!--/row-->
                </div>
                <hr>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <!-- <button type="button" class="btn btn-inverse">Cancel</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form -->

<!-- Start Table -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Linkedin</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Compay</th>
                            <th>Gender</th>
                            <th>Link</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Gojek</td>
                            <td>Male</td>
                            <td>https://www.linkedin.com/in/januar-triandy-nur-elsan-a1b839144/</td>
                            <td>2011/04/25</td>
                        </tr>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- This is data table -->
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>



<!-- Start Table -->
@endsection