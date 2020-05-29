@extends('layouts.main')

@section('breadcumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Superadmin</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Brainstroming</a></li>
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
            <h4 class="m-b-0 text-white">Brainstroming Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.brainstroming.submit') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-body">
                    <h3 class="box-title">Brainstroming Info</h3>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">                        
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Speaker</label>
                                <div class="col-md-9">
                                    <select required name="speaker_id"class="form-control custom-select">
                                        @foreach($users as $row)
                                            @if(!$row->hasRole(1))
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>                                        
                                            @endif
                                        @endforeach
                                    </select>
                                    <!-- <small class="form-control-feedback"> Select Soldier to Give VPoint. </small> -->
                                </div> 
                            </div>
                        </div>                       
                    </div>
                    <div class="row">                        
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Title</label>
                                <div class="col-md-9">
                                    <input required name="title" type="text" class="form-control form-control-danger" >
                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Description</label>
                                <div class="col-md-9">
                                    <textarea required name="description" class="form-control" rows="5"></textarea>                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <!--/row-->    
                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Date</label>
                                <div class="col-md-9">
                                    <input required name="date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->                        
                    </div>
                    <!--/row--> 
                    <div class="row">                                                
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Time</label>                                
                                <div class="col-md-9">
                                    <input required name="time" type="text" placeholder="13:00" data-mask="99:99" class="form-control">                                                                        
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

<!-- Start Table -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Brainstroming Table</h4>
            <!-- <h6 class="card-subtitle">Please check name before connect to Avoid Redundant Connect</h6> -->
            <div class="table-responsive m-t-40">
                <table id="brainstromingTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>                            
                            <th>Speaker</th>                            
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brainstromings as $row)
                        <tr>    
                            
                            <td>{{ $row->user->name }}</td>                            
                            <td>{{ $row->title }}</a></td>
                            <td>{{ $row->description }}</a></td>
                            <td>{{ $row->date }}</td>
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
    <script src="{{ asset('material/js/mask.js')}}"></script>
    <script>$('#brainstromingTable').DataTable();</script>
@endsection