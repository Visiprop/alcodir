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
                            @if(\Carbon\Carbon::parse($row->created_at)->format('d/m/Y') === \Carbon\Carbon::parse($today)->format('d/m/Y') && Auth::getUser()->id === $row->user_id)
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Connected Today</h5></div>
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
                            @if(\Carbon\Carbon::parse($row->created_at)->format('m/Y') === \Carbon\Carbon::parse($today)->format('m/Y') && Auth::getUser()->id === $row->user_id)
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Connected This Month</h5></div>
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
                            @if(Auth::getUser()->id === $row->user_id)
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Total Connected</h5></div>
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
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Position and Company</label>
                                <div class="col-md-9">
                                    <input required name="position" type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> CEO at PT Karya Anak Bangsa </small> 
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Link</label>
                                <div class="col-md-9">
                                    <input required name="url" type="text" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> Link Account </small> </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <!--/row-->                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Gender</label>
                                <div class="col-md-9">
                                    <!-- Ucok Request, Female as Default Value -->
                                    @if(Auth::getUser()->id === 7) 
                                    <input name="gender" type="radio" id="gender_male" value="male" class="with-gap radio-col-alcodir-blue">
                                    <label for="gender_male">Male</label>                                

                                    <input name="gender" type="radio" id="gender_female" value="female" class="with-gap radio-col-alcodir-blue" checked>
                                    <label for="gender_female">Female</label>                                
                                    @else
                                    <input name="gender" type="radio" id="gender_male" value="male" class="with-gap radio-col-alcodir-blue" checked>
                                    <label for="gender_male">Male</label>                                

                                    <input name="gender" type="radio" id="gender_female" value="female" class="with-gap radio-col-alcodir-blue">
                                    <label for="gender_female">Female</label>                                
                                    @endif
                                    
                                </div>
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
            <h4 class="card-title">All Linkedin Connected Table</h4>
            <h6 class="card-subtitle">Please check name before connect to Avoid Redundant Connect</h6>
            <div class="table-responsive m-t-40">
                <table id="linkedinTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>                            
                            <th>Position & Company</th>                            
                            <th>URL</th>
                            <th>Gender</th>
                            <th>Connected by</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($linkedinConnects as $row)
                        <tr>    
                            
                            <td>{{ $row->position }}</td>                            
                            <td><a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a></td>
                            <td>{{ $row->gender }}</td>
                            <td>{{ $row->user->name }}</td>
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