@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Soldier</a></li>
            <!-- <li class="breadcrumb-item active">soldier</li> -->
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('content')
<!-- Start Absency -->

<div class="col-12">                    
    <div class="card text-center">
        <div class="card-header">
            Daily Absency 
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-md-6 offset-md-3">
                <h4 class="card-title">What is success? I think it is a mixture of having a flair for the thing that you are doing; knowing that it is not enough, that you have got to have hard work and a certain sense of purpose.</h4>
                </div>
            </div>            
            <p class="card-text"><i>~ Margaret Thatcher, former UK Prime Minister</i></p>
            <form action="{{ route('absency.submit') }}" method="POST" class="form-horizontal">
                @csrf                
                @empty($myAbsency)     
                    @if(\Carbon\Carbon::parse(now())->hour > 9)               
                    <button type="submit" class="btn btn-success">Absent</button>
                    @endif
                @endempty
            </form>
        </div>
        <div class="card-footer text-muted">            
            @isset($myAbsency)
                @if($myAbsency->status === 1)
                    Late
                @else
                    On Time
                @endif
            @endisset
            @empty($myAbsency)                    
                Open
            @endempty
            
        </div>
    </div>
</div>    
<!-- End Absency -->        

<!-- Start Monthly Point -->
<div class="col-xl-3">
    <div class="card earning-widget">
        <div class="card-header">
            
            <h4 class="card-title m-b-0">LinkedIn Connect Board</h4>
        </div>
        <div class="card-body b-t collapse show">
            <table class="table v-middle no-border">
                <tbody>
                    <tr>
                        <td style="width:40px"><img src="{{ asset('material/images/users/1.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Rendy</td>
                        <td align="right"><span class="label label-light-info">{{$rendyLC}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:40px"><img src="{{ asset('material/images/users/1.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Saehu</td>
                        <td align="right"><span class="label label-light-info">{{$saehuLC}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:40px"><img src="{{ asset('material/images/users/1.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Sule</td>
                        <td align="right"><span class="label label-light-info">{{$suleLC}}</span></td>
                    </tr>                                        
                </tbody>
            </table>
        </div>
    </div>    
</div>
<!-- End Monthly Point -->

<!-- Start Absency -->
<div class="col-xl-3">
    <div class="card earning-widget">
        <div class="card-header">
            
            <h4 class="card-title m-b-0">Today Absency Board <span style="font-size: 13px;"><i>{{now()->format('d-m-Y')}}</i></span></h4>
        </div>
        <div class="card-body b-t collapse show">
            <table class="table v-middle no-border">
                <tbody>
                    @foreach($todayAbsencies as $row)
                    <tr>
                        <td style="width:40px"><img src="{{ asset('material/images/users/1.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->created_at->format('H:i:s') }}</td>
                        @if($row->status === 1)
                            <td align="right"><span class="label label-light-danger">Late</span></td>
                        @else
                            <td align="right"><span class="label label-light-info">On Time</span></td>
                        @endif
                    </tr> 
                     
                    @endforeach                                                       
                </tbody>
            </table>
        </div>
    </div>    
</div>
<!-- End Absency -->


@endsection