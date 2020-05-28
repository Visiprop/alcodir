@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Management</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Daily Report</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
                        @foreach ($dailyReports as $row)                            
                            @if(\Carbon\Carbon::parse($row->created_at)->format('d/m/Y') === \Carbon\Carbon::parse($today)->format('d/m/Y'))
                                @php($count++) 
                            @endif
                        @endforeach
                    {{ $count }}
                    </h3>
                    <h5 class="text-muted m-b-0">Daily Report Today</h5></div>
            </div>            
        </div>        
    </div>    
</div>

<!-- End Overview -->

<!-- Start Table -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Daily Report</h4>
            <!-- <h6 class="card-subtitle">Please check name before connect to Avoid Redundant Connect</h6> -->
            <div class="table-responsive m-t-40">
                <table id="dailyReportTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>                            
                            <th>Reported by</th>                            
                            <th>Fact</th>
                            <th>Advice</th>
                            <th>Review</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReports as $row)
                        <tr>                                
                            <td>{{ $row->user->name }}</td>                                                        
                            <td>{{ $row->fact }}</td>
                            <td>{{ $row->advice }}</td>
                            <td>{{ $row->review }}</td>
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
    <script>$('#dailyReportTable').DataTable();</script>
@endsection