@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Superadmin</a></li>
            <!-- <li class="breadcrumb-item active">soldier</li> -->
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('content')

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
                        <td style="width:40px"><img src="{{ asset('alcodir/images/users/Rendy.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Rendy</td>
                        <td align="right"><span class="label label-light-info">{{$rendyLC}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:40px"><img src="{{ asset('alcodir/images/users/Syaekhu.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Syaekhu</td>
                        <td align="right"><span class="label label-light-info">{{$syaekhuLC}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:40px"><img src="{{ asset('alcodir/images/users/Zulkifli.jpg')}}" width="50" class="img-circle" alt="logo"></td>
                        <td>Zulkifli</td>
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
                        <td style="width:40px"><img src="{{ $row->user->photo_path}}" width="50" class="img-circle" alt="logo"></td>
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

@section('script')
<script>
    fetch('https://api.quotable.io/random')
    .then(response => response.json())
    .then(data => {
        document.getElementById("quoteText").innerHTML = data.content
        document.getElementById("quoteAuthor").innerHTML = `~ ${data.author}`
        
        console.log(`${data.content} —${data.author}`)
    })
</script>
@endsection