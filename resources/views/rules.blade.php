@if($event->type <= 3)
@extends('navigation')
@else

@endif


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
					<h3 class="box-title">Rules</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ul>
						@foreach($rules as $rule)
						<li>{{$rule}}</li>
						@endforeach
					</ul>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

