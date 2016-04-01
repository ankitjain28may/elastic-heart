@extends('navigation')
@section('content_single')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
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
					<h2 id='clock'></h2>
					<button id="redir" class="btn btn-success">PLAY</button>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
	$('#redir').css('display', 'none');
    $("#clock").countdown("{{$event->start_time}}", function(event){
        $(this).html(event.strftime('%D days %H:%M:%S'));
    }).on('finish.countdown', function(){
    	$('#redir').css('display', 'block');
    });;
    $('#redir').click(function(){
    	window.location.href = window.location.href;
    });
</script>
@stop