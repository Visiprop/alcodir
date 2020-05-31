@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">VPoint</a></li>
            <li class="breadcrumb-item active">My VPoint</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('content')

<!-- Start Monthly Point -->
<div class="col-xl-12">
    <div class="card earning-widget">
        <div class="card-header">            
            <h4 class="card-title m-b-0">VPoint Board</h4>
        </div>
        <div class="card-body b-t collapse show">
            <table class="table v-middle no-border">
                <tbody>
                    @foreach($myVPointRequests as $row)
                    <tr>                              
                        <td>{{ $row->reason }}</td>
                        <td align="right"><span class="label label-light-info">{{$row->point}}</span></td>
                    </tr>   
                    @endforeach                                                         

                    @php($points = 0) 
                        @foreach ($myVPointRequests as $row)                                                        
                                @php($points += $row->point)                             
                        @endforeach
                    

                    <tr>                        
                        <td><b>TOTAL</b></td>
                        <td align="right"><span class="label label-light-info"><b>{{ $points }}</b></span></td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>    
</div>
<!-- End Monthly Point -->



@endsection

@section('script')

@endsection