@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Management</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Late Permit</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection


@section('content')

<!-- Start Table -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Late Permit Table</h4>            
            <form id="permitActionForm" action="{{ route('management.latepermit.action') }}" method="post" class="form-horizontal">
                @csrf   
                {{ method_field('PUT') }}
                <input hidden id="id" name="id" type="number">  
                <input hidden id="status" name="status" type="number">  
            </form>
            <div class="table-responsive m-t-40">
                <table id="latePermitTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Requester</th>                             
                            <th>Reason</th>                            
                            <th>Late Date</th>
                            <th>Status</th>
                            <th>Request At</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($latePermits as $row)
                            <tr>    
                                <td>{{ $row->user->name }}</td>
                                <td>{{ Str::limit($row->reason, $limit = 50, $end = '...') }}</td>
                                <td>{{ $row->date }}</td>
                                @if($row->status === 0)
                                <td><span class="badge badge-warning">Waiting</span></td>
                                @elseif($row->status === 1)
                                <td><span class="badge badge-success">Permited</span></td>
                                @else
                                <td><span class="badge badge-danger">Rejected</span></td>
                                @endif
                                <td>{{ $row->created_at }}</td>                           
                                <td>                                                                               
                                    <button onclick="submitForm({{ $row->id }},1)"  class="btn waves-effect waves-light btn-info" data-toggle="tooltip" data-original-title="Permit" aria-describedby="tooltip776767"><i class="ti-check" aria-hidden="true"></i></button>                                
                                    <button onclick="submitForm({{ $row->id }},2)"  class="btn waves-effect waves-light btn-danger" data-toggle="tooltip" data-original-title="Reject" aria-describedby="tooltip776767"><i class="ti-close" aria-hidden="true"></i></button>                            
                                </td>                            
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
      
    <script type="text/javascript">
        function submitForm(id, status) {
            document.getElementById("id").value = id
            document.getElementById("status").value = status       
            // $("#permitActionForm").submit()
            document.getElementById("permitActionForm").submit()
        }
    </script>
    <script>$('#latePermitTable').DataTable();</script>
@endsection