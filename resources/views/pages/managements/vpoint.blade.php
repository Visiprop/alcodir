@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Management</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">VPoint</a></li>
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
                <div class="round round-lg align-self-center round-info"><i class="ti-files"></i></div>
                <div class="m-l-10 align-self-center">
                    <h3 class="m-b-0 font-light">
                    @php($count=0) 
                        @foreach ($vpointRequests as $row)                            
                            @if($row->status === 0)
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Request Opened</h5></div>
            </div>            
        </div>        
    </div>    
</div>
<!-- End Overview -->

<!-- Start Form -->
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">VPoint</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('management.vpoint.submit') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-body">
                    <h3 class="box-title">Request Form</h3>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Soldier</label>
                                <div class="col-md-9">
                                    <select required name="soldier_id"class="form-control custom-select">
                                        @foreach($soldiers as $row)
                                            @if($row->hasRole(3))
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>                                        
                                            @endif
                                        @endforeach
                                    </select>
                                    <small class="form-control-feedback"> Select Soldier to Give VPoint. </small> </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">VPoint</label>
                                <div class="col-md-9">
                                    <input required name="point" type="number" class="form-control form-control-danger" >
                                    <small class="form-control-feedback"> VPoint to Give </small> </div>
                            </div>
                        </div>
                        <!--/span--> 
                                                                    
                    </div>
                    <!--/row-->
                    <div class="row">                        
                         
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Reason</label>
                                <div class="col-md-9">
                                    <!-- <input required name="reason" type="text" class="form-control" > -->
                                    <textarea required name="reason"class="form-control" rows="5"></textarea>
                                    <small class="form-control-feedback"> Reason to Give VPoint</small> </div>
                            </div>
                        </div>
                        <!--/span-->                          
                    </div>                   
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
            <h4 class="card-title">VPoint Request Table</h4>
            <!-- <h6 class="card-subtitle">Please check name before connect to Avoid Redundant Connect</h6> -->
            <div class="table-responsive m-t-40">
                <table id="vpointTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Requester</th>
                            <th>Soldier</th>
                            <th>Reason</th>
                            <th>VPoint</th>
                            <th>Date</th>                            
                            <th>Status</th>                                                                                    
                            <th>Action</th>                                                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vpointRequests as $row)
                        <tr>
                            <td>{{ $row->requester->name }}</td>
                            <td>{{ $row->soldier->name }}</td>
                            <td>{{ $row->reason }}</td>
                            <td>{{ $row->point }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>                                                                
                                @if($row->status === 0)
                                    <span class="badge badge-warning">Waiting</span>
                                @elseif($row->status === 1)
                                    <span class="badge badge-success">Approved</span>
                                @else
                                    <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>                            
                            @if($row->status === 0)
                            <td>                                
                                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="tooltip" data-original-title="Approve" aria-describedby="tooltip776767"><i class="ti-check" aria-hidden="true"></i></button>
                                <button type="button" class="btn waves-effect waves-light btn-danger" data-toggle="tooltip" data-original-title="Reject" aria-describedby="tooltip776767"><i class="ti-close" aria-hidden="true"></i></button>
                            </td>
                            @else 
                            <td>                                
                                <button hidden type="button" class="btn waves-effect waves-light btn-info" data-toggle="tooltip" data-original-title="Approve" aria-describedby="tooltip776767"><i class="ti-check" aria-hidden="true"></i></button>                                
                            </td>                           
                            @endif
                            
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
    
    <script>$('#vpointTable').DataTable();</script>
@endsection