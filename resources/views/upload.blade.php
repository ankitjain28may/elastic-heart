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
			@if(Session::has('message'))
				<div class = "alert alert-success">
					{!!Session::get('message')!!}
				</div>
				@endif
			
			@if(Session::has('errormessage'))
				<div class = "alert alert-danger">
					{!!Session::get('errormessage')!!}
				</div>
				@endif
				<div class="box-header">
					<h3 class="box-title">Upload file:</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="upload" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" class="form-control" name="file">
						</div>
						<div class="form-group">
							<input type="text" value="{{csrf_token()}}" name="_token" hidden>
						</div>
						<div class="form-group">
							<input type="submit">
						</div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

