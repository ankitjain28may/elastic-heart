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
					<h3 class="box-title">Cheers..!!</h3>
				</div>
				<!-- /.box-header -->
				<div class=" row box-body">
					<div class="col-md-offset-3 col-md-6">
						You've successfully completed the Event...
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop