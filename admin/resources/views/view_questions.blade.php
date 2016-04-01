@extends('common')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 ">
            <h1 class="page-header text-center" >View Questions</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
    <table class="table table-bordered">
        <tr>
            <th style="width:5%">#</th>
            <th class="col-md-2">Question</th>
            <th class="col-md-1">Option A</th>
            <th class="col-md-1">Option B</th>
            <th class="col-md-1">Option C</th>
            <th class="col-md-1">Option D</th>
            <th class="col-md-1">Answer</th>
            <th class="col-md-1">Edit</th>
            <th class="col-md-1">Delete</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Errata</td>
            </td>
            <td>Option A</td>
            <td>Option B</td>
            <td>Option C</td>
            <td>Option D</td>
            <td>Answer</td>
            <td><a class="btn btn-info btn-xs"
                role="edit_button">
                Edit</a>
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
