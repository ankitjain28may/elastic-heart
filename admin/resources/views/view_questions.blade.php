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
            <th class="col-md-1">Options</th>
            <th class="col-md-1">File</th>
            <th class="col-md-1">Image</th>
            <th class="col-md-1">Html</th>
            <th class="col-md-1">Answers</th>
            <th class="col-md-1">Edit</th>
            <th class="col-md-1">Delete</th>
        </tr>
         <?php $i=1;?>
             @foreach($data as $d)
            

        <tr>
            <td><?php $i;?></td>
            <td>{!!$d->question!!}</td>
            <?php   $a = unserialize($d->options);?>
            @foreach($a as $opt)
            <td>{!!$opt!!}</td>
            @endforeach
            <td>{!!$d->file!!}</td>
            <td>{!!$d->image!!}</td>
            <td>{!!$d->html!!}</td>`
            @foreach($ans as $a)
            <td>{!!$a->answer!!}</td>
            @endforeach
            <td><a class="btn btn-info btn-xs"
                role="edit_button" href="editquestion/{{$d->id}}">
                Edit</a>
            <td><a class="btn btn-danger btn-xs"
                    role="del_button" href="deletequestion/{{$d->id}}">
                    Delete</a>
            </td>
             <?php $i=$i+1;?>
        </tr>  
         @endforeach      
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
