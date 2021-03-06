@extends('common')
@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 ">
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
              <form role="form" method="post" action="{{url('addevent')}}">
                <div class="form-group">
                  <label>Event Name</label>
                  <input class="form-control" name = "event_name">
                </div>
                <div class="form-group">
                  <label>Event Details</label>
                  <textarea class="form-control" rows="3" name = "event_des"></textarea>
                </div>
                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" placeholder='YYYY-MM-DD' name="start_date" class="form-control" pattern="2016-04-0[7-9]" >
                </div>
                <div class="form-group">
                  <label>Start Time</label>
                  <input type="time" placeholder='HH:MM' name="start_time" class="form-control" pattern="[0-1][0-9]|2[0-3]:[0-5][0-9]" >

                </div>
                <div class="form-group">
                  <label>End Date</label>
                  <input type="date" placeholder='YYYY-MM-DD' name="end_date" class="form-control" pattern="2016-04-0[7-9]" >

                </div>
                <div class="form-group">
                  <label>End Time</label>
                  <input type="time" placeholder='HH:MM' name="end_time" class="form-control" pattern="[0-1][0-9]|2[0-3]:[0-5][0-9]" >

                </div>

                <div class="form-group">
                  <label>Event Type</label>

                  <select id ="type" name="event_type" onchange = "adding()" class="form-control" required>
                    <option value = "1">Single Answer</option>
                    <option value = "2">Single Answer with Backward Game Flow </option>
                    <option value = "3"> Only Question (Descriptive)</option>
                    <option value = "4"> MCQ</option>

                  </select>

                </div>
                <div id="duration" class="form-group">

                </div>


                <div class="form-group">
                 {{csrf_field()}}
               </div>

               <button type="submit" class="btn btn-default">Submit</button>
             </div>
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

 <script type="text/javascript">
   function adding(){
    if($("#type").val() == '4'){

     $("#duration").html("<label>Duration For Each User</label> <input class='form-control' placeholder='Duration (In Minutes)' name = 'duration'>");
   }
   else
   {
     $("#duration").empty();
   }

 }

</script>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
@stop
