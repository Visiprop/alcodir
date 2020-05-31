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
                <form action="{{ route('dailyreport.submit') }}" method="POST" class="form-horizontal" onsubmit="submitForm()">
                    @csrf
                    <input type="text" name="indexes" id="taskIndexes" hidden>
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
                                    <textarea name="advice" class="form-control" rows="5"></textarea>
                                    <small class="form-control-feedback"> Advice for All of Us (Optional)</small> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Task</label>
                            </div>
                        </div>
                        <div class="row" id="inputTask-Warp">
                            <div class="col-md-12 col-lg-12" >
                                <div class="row" id="warpTask_0">
                                    <div class="col-lg-12 col-md-12" >
                                        <div class="input-group bootstrap-touchspin">
                                            <input id="indexTask_0" name="indexTask_0"  type="text" placeholder="Example: Create a design for PT.example." data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" class="form-control" style="display: block;">
                                            
                                            <div class="input-group-append">
                                                <button hidden id="spliceTask_0" class="btn btn-danger bootstrap-touchspin-up" type="button" onclick="spliceTask(0)">-</button>
                                                <button Task="background-color: #0f4ba4;" id="plusTask_0" class="btn btn-primary bootstrap-touchspin-up" type="button" onclick="addMoreTask()">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div><hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                                                    
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>

                            </div>
                        </div>
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
    <script>
        $('#dailyReportTable').DataTable();
        // VARIABLE DESIGN Task
        var xTask = 1 //INDEXING INPUT DESIGN Task
        var counterWarp_Task = [0] //INDEX STORAGE DESIGN Task
        var warpInput_Task = $("#inputTask-Warp") //WARP INPUT DESIGN Task

        // START FUNC DESIGN Task
        function addMoreTask() {
            warpInput_Task.append(`
            <div class="col-lg-12 col-md-12" id="warpTask_${xTask}" >
                <br>
                <div class="input-group bootstrap-touchspin">
                    <input id="indexTask_${xTask}" name="indexTask_${xTask}"  type="text" placeholder="Example: Create a design for PT.example." data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" class="form-control" Task="display: block;">
                    
                    <div class="input-group-append">
                        <button hidden id="spliceTask_${xTask}" class="btn btn-danger bootstrap-touchspin-up" type="button" onclick="spliceTask(${xTask})">-</button>
                        <button id="plusTask_${xTask}" class="btn btn-primary bootstrap-touchspin-up" type="button" onclick="addMoreTask()">+</button>
                    </div>
                </div>
            </div>`)
            if(counterWarp_Task.length == 1) {
                $(`#spliceTask_${counterWarp_Task[0]}`).removeAttr('hidden')
                $(`#plusTask_${counterWarp_Task[0]}`).attr('hidden', true)
            } else {
                $(`#spliceTask_${counterWarp_Task[ counterWarp_Task.findIndex(_Task => _Task == (xTask - 1)) ]}`).removeAttr('hidden')
                $(`#plusTask_${counterWarp_Task[ counterWarp_Task.findIndex(_Task => _Task == (xTask - 1)) ]}`).attr('hidden', true)
            }
            counterWarp_Task.push(xTask)
            let temps = ''
            counterWarp_Task.map((_val, ind) => {
                if(counterWarp_Task.length == (ind+1)) {
                    temps += ''+_val
                } else {
                    temps += ''+_val+'/'
                }
            })
            $("#taskIndexes").val(temps)
            xTask++;
        }

        async function spliceTask( warpNumber ) {
            if(counterWarp_Task.length > 1) {
                $(`#warpTask_${warpNumber}`).remove()
                await counterWarp_Task.splice(counterWarp_Task.findIndex( _warpNumber => _warpNumber == warpNumber ), 1)
                if(counterWarp_Task.length == 1) {
                    $(`#spliceTask_${counterWarp_Task[0]}`).attr("hidden", true);
                }
                let temps = ''
                counterWarp_Task.map((_val, ind) => {
                    if(counterWarp_Task.length == (ind+1)) {
                        temps += ''+_val
                    } else {
                        temps += ''+_val+'/'
                    }
                })
                $("#taskIndexes").val(temps)
            }
        }

        function submitForm() {
            console.log('return Submited')
            return false
        }
        // END FUNC DESIGN Task
    </script>
    
@endsection