@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Daily Report</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Soldier</a></li>
            <li class="breadcrumb-item active">form</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection


@section('content')


<!-- Start Form -->
@empty($myDailyReport)     
    @if(\Carbon\Carbon::parse(now())->hour >= 16 ) 
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Daily Report Form </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dailyreport.submit') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-body">
                        <h3 class="card-title">Report</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fact</label>
                                    <textarea required name="fact" class="form-control" rows="5"></textarea>
                                    <small class="form-control-feedback"></small> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-label">
                                    <label class="control-label">Advice</label>
                                    <textarea name="advice"class="form-control" rows="5"></textarea>
                                    <small class="form-control-feedback"> Advice for All of Us (Optional)</small> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->                                        
                    </div>
                    <div class="form-actions">
                                                            
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                Daily Report Open at 16:00 - 19:00 WIB
            </div>
        </div>
    </div>
    @endif
@endempty

@isset($myDailyReport)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                Daily Report Submitted
                @if($myDailyReport->status == 0)
                    <span class="badge badge-success">On Time</span>
                @else
                    <span class="badge badge-danger">Late</span>
                @endif
            </div>
        </div>
    </div>
@endisset
<!-- End Form -->


<!-- Start Table -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daily Report Table</h4>
            <h6 class="card-subtitle"></h6>
            <div class="table-responsive m-t-40">
                <table id="dailyReportTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Fact</th>
                            <th>Advice</th>
                            <th>Date</th>
                            <!-- <th>Status</th>                             -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReports as $row)
                            @if(Auth::getUser()->id === $row->user_id)
                            <tr>
                                <td>{{ $row->fact }}</td>
                                <td>{{ $row->advice }}</td>
                                <td>{{ $row->created_at }}</td>
                                <!-- <td>{{ $row->status }}</td>                             -->
                            </tr>  
                            @endif                      
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
    <script>$('#dailyReportTable').DataTable();</script>
    
@endsection