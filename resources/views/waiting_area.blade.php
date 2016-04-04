@extends('navigation')
@section('content_single')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<script src="{{URL::asset('public/js/flipclock.min.js')}}"></script>
	<link rel="stylesheet" href="{{URL::asset('public/css/flipclock.css')}}">
	<section class="content-header">
		<h1>{{ strtoupper($event->event_name) }}
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class='col-xl-6 col-xl-offset-3'>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Hold your horses</h3>
				</div>
				<!-- /.box-header -->
				<div class=" row box-body">
					<div class="col-md-offset-3 col-md-6">
						The event has not yet started.
					</div>
				</div>
					<h2 id='clock'></h2>
					<button id="redir" class="btn btn-success">PLAY</button>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
	$('#redir').hide();
    
    $('#redir').click(function(){
    	window.location.reload();
    });
    var start = Date.parse('{{$event->start_time}}');
    var now = Date.now();
    var time = start - now;
    var clock = $('#clock').FlipClock({
		countdown:true,
		clockFace:'DailyCounter',
		stop: function(){
		$('#redir').show();}
	});

	console.log(start);
	console.log(now);
	console.log(time/1000);
	clock.setTime(parseInt(time/1000));
	clock.start();
</script>
@stop