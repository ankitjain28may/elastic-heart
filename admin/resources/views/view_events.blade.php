@extends('common')
@section('content')

<div id="page-wrapper">
    <div class="row">
    @if(Session::has('message'))
        <div class="col-lg-12 alert alert-success" >
        <h4 >{{Session::get('message')}}</h4>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="col-lg-12 alert alert-danger" >
        <h4 >{{Session::get('error')}}</h4>
        </div>
        @endif
        
        <div class="col-lg-6 col-lg-offset-3 ">
            <h1 class="page-header text-center" >Add New Event</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                           @if(isset($data) && !empty($data) )
                           <table class="table table-bordered">
                            <tr>
                                <th style="width:5%">#</th>
                                <th class="col-md-2">Event Name</th>
                                <th class="col-md-2">Event Type</th>

                                @if(Auth::user()->privilege > 6)   
                                <th class="col-md-2">Society</th>
                                @endif
                                <th class="col-md-1">Edit</th>
                                <th class="col-md-1">Delete</th>
                            </tr>

                            @foreach($data as $d)
                            <tr>
                                <td>{!! $d->id!!}</td>
                                <td>{!! $d->event_name!!}</td>
                                @if(Auth::user()->privilege > 6)   
                                <td>{{$d->soc}}</td>
                                @endif
                                
                                <td>@if($d->type == 0)
                                    Single Answer
                                    @elseif($d->type == 1)
                                    Single Answer (B)
                                    @elseif($d->type == 2)
                                    Only Question (Descriptive)
                                    @else
                                    MCQ
                                    @endif
                                </td>
                                <td><a class="btn btn-info btn-xs" href="editevent/{{$d->id}}"
                                    role="edit_button">
                                    Edit</a>
                                </td>

                                <td><a class="btn btn-danger btn-xs" href="deleteevent/{{$d->id}}"
                                    role="del_button">
                                    Delete</a>
                                </td>
                            </tr> 
                            @endforeach       
                        </table>
                        @else
                        <h3>NO EVENT ADDED YET!!!! <br>CLICK <a href="{{route('add_event')}}">HERE</a> TO ADD A NEW EVENT</h3>  
                        @endif
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
@stop
