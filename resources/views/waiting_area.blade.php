@extends('navigation')
@section('content_single')
<style type="text/css">
body {
	text-align: center;
}
.box-title {
	font-weight: 600;
}
.box-body p {
	font-weight: 400;
	font-size: 24px;
	margin-bottom: 80px;
	color: #2ECC71;
}
.content-header h1 {
	margin-top: 20px;
	color: #9B59B6;
	font-size: 30px !important;
	font-weight: 800;

}
.box-header {
	margin-top: 3em;
}
</style>

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
		<div class='col-xs-8 col-xs-offset-2'>
			<div class="box">
				<!-- /.box-header -->
				<div class=" row box-body">
					<div class="col-md-offset-3 col-md-6">
						<p>The event has not yet started.</p>
					</div>
				</div>
					<h2 id='clock'></h2>
					<button id="redir" class="btn btn-success">PLAY</button>
				<!-- /.box-body -->
			</div>
			<div class="box-header">
				<h3 class="box-title">Hold your horses !</h3>
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