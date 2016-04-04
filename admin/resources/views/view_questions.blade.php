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
    <div class="container">
       <div class="col-lg-10 col-lg-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading">
               </div>
               <div class="panel-body">
                   <div class="row">
                       <div class="col-lg-12">
                       @if(count($data)>0)
   <table class="table table-bordered">
       <tr>

           <th style="width:5%">#</th>
           <th class="col-md-2">Question</th>
           <th class="col-md-2">Options</th>
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
           <td> {!! $i !!}</td>
           <td>{!! $d->question !!}</td>
           @if($d->options!=null)
           <?php   $a = unserialize($d->options);?>
           <td>
           @foreach($a as $opt)
           {!!$opt!!}<br>
           @endforeach
           </td>
           @else
            <td>Answer</td>
           @endif
           <td>{!!$d->file!!}</td>
           <td>{!!$d->image!!}</td>
           <td>{!!$d->html!!}</td>
          <td> 
           @foreach($d->ans as $a)
           @if($a!=null)
            {!!$a!!}<br>
              @endif
            @endforeach
              </td>

          


       
           <td><a class="btn btn-info btn-xs"
               role="edit_button" href="{{url('editquestion')}}/{{$d->id}}">
               Edit</a>
           <td><a class="btn btn-danger btn-xs"
                   role="del_button" href="{{url('deletequestion')}}/{{$d->id}}">
                   Delete</a>
           </td>
            <?php $i=$i+1;?>
       </tr>  
        @endforeach      
   </table>
   @else
   <h3>No Quesions Added</h3>
   @endif
                   </div>
                   <a href="{{url('add_questions')}}" class="btn btn-info btn-xs">ADD MORE</a>
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