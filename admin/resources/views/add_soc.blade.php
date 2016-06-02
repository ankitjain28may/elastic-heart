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
              <form role="form" method="post" action="{{url('add_soc')}}">
                <div class="form-group">
                  <label>Society Name</label>
                  <input class="form-control" name = "society_name" required>
                </div>
                <div class="form-group">
                  <label>Society Username</label>
                  <input class="form-control" name = "username" required>

                </div>

                <div class="form-group">
                  <label>Society Email (For Communication Purpose)</label>
                  <input class="form-control" name = "email" required>

                </div>
                <div class="form-group">
                  <label>Society Password</label>
                  <input type = "password" class="form-control" name = "password" required>
                  
                </div>
                <div class="form-group">

                  <label>Society Password Confirmation</label>
                  <input type = "password" class="form-control" name = "password_confirmation" required>
                  
                </div>
                <div class="form-group">
                 {{csrf_field()}}
               </div>
               <button type="submit" class="btn btn-default">Submit</button>
             </div>

              @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

           </form>
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


 <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
 <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
@stop
