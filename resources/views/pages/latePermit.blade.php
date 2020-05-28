@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">General</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Late Permit</a></li>
            <li class="breadcrumb-item active">Form</li>
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
            <h4 class="m-b-0 text-white">Late Permit Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('latepermit.submit') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-body">
                    <h3 class="box-title">Permit Info</h3>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">                        
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Reason</label>
                                <div class="col-md-9">
                                    <textarea required name="reason" class="form-control" rows="5"></textarea>
                                    <small class="form-control-feedback"> Reason to Late </small> 
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Late Entry Date</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                    <small class="form-control-feedback"> Late Date on </small> </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>

                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Entry Time</label>                                
                                <div class="col-md-9 input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input id="timepicker" type="text" class="form-control" value="13:14">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
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


@endsection

@section('script')
    <script src="{{ asset('material/plugins/moment/moment.js')}}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{ asset('material/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>

    <script>
        $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
    </script>



    <script>$('#latePermitTable').DataTable();</script>
@endsection