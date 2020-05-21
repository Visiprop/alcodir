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

<!-- Start Overview -->

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row">
                <div class="round round-lg align-self-center round-info"><i class="ti-user"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0 font-light">
                    @php($count=0) 
                        @foreach ($linkedinConnects as $row)                            
                            @if(\Carbon\Carbon::parse($row->created_at)->format('d/m/Y') === \Carbon\Carbon::parse($today)->format('d/m/Y'))
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Connect Today</h5></div>
            </div>            
        </div>        
    </div>    
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row">
                <div class="round round-lg align-self-center round-info"><i class="ti-user"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0 font-light">
                    @php($count=0) 
                        @foreach ($linkedinConnects as $row)                            
                            @if(\Carbon\Carbon::parse($row->created_at)->format('m/Y') === \Carbon\Carbon::parse($today)->format('m/Y'))
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Connect This Month</h5></div>
            </div>            
        </div>        
    </div>    
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row">
                <div class="round round-lg align-self-center round-info"><i class="ti-user"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0 font-light">{{ $linkedinConnects->count() }}</h3>
                    <h5 class="text-muted m-b-0">Total Connect</h5></div>
            </div>            
        </div>        
    </div>    
</div>
<!-- End Overview -->

<!-- Start Form -->
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Linkedin Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('linkedin.submit') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-body">
                    <h3 class="box-title">Person Info</h3>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input required name="name" type="text" class="form-control" >
                                    <small class="form-control-feedback"> Nama Lengkap </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Position</label>
                                <div class="col-md-9">
                                    <input required name="position" type="text" class="form-control form-control-danger" >
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
                                    <input required name="company" type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> PT. Mamkur, Gojek, MonsterAR etc </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Gender</label>
                                <div class="col-md-9">
                                    <select required name="gender"class="form-control custom-select">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
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
                                    <input required name="url" type="text" class="form-control form-control-danger" >
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
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="linkedinTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>URL</th>
                            <th>Gender</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($linkedinConnects as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->position }}</td>
                            <td>{{ $row->company }}</td>
                            <td>{{ $row->url }}</td>
                            <td>{{ $row->gender }}</td>
                            <td>{{ $row->created_at }}</td>
                        </tr>                        
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>

<!-- End Table -->
@endsection

@section('script')
    <script>$('#linkedinTable').DataTable();</script>
@endsection