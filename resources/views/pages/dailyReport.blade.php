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
<div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Daily Report Form</h4>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="form-body">
                    <h3 class="card-title">Report</h3>
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fact</label>
                                <textarea class="form-control" rows="5"></textarea>
                                <small class="form-control-feedback"></small> </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-label">
                                <label class="control-label">Advice</label>
                                <textarea class="form-control" rows="5"></textarea>
                                <small class="form-control-feedback"> Advice for All of Us </small> </div>
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
                            <th>Date</th>
                            <th>Advice</th>
                            <th>Status</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReports as $row)
                        <tr>
                            <td>{{ $row->fact }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->advice }}</td>
                            <td>{{ $row->status }}</td>                            
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