@extends('common')
@section('content')

<div id="page-wrapper">
    <div class="row">
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
    <table class="table table-bordered">
        <tr>
            <th style="width:5%">#</th>
            <th class="col-md-2">Event Name</th>
            <th class="col-md-1">Edit</th>
            <th class="col-md-1">Delete</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Errata</td>
            <td><a class="btn btn-info btn-xs"
                role="edit_button">
                Edit</a>
            </td>

            <td><a class="btn btn-danger btn-xs"
                    role="del_button">
                    Delete</a>
            </td>
        </tr>        
    </table>
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
