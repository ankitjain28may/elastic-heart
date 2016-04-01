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
					<h3 class="box-title">Leaderboard</h3>
				</div>
				<!-- /.box-header -->
				<div class=" row box-body">
					<div class="col-md-offset-3 col-md-6">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th style="width: 80px; text-align:center">Rank</th>
								<th style="text-align:center" >Participant</th>
							</tr>
							@foreach($leaders as $rank=>$student)
							<tr>
								<td style="vertical-align:middle; text-align:center">{{$rank + 1}}</td>
								<td style="text-align:center"><div class="user-panel">
									<div class="pull-left image">
										<img src="{{ $student['user']->avatar }}" class="img-circle" alt="User Image">
									</div>
									<div class="pull-left info" style="color:#121212">
										<h4>{{ $student['user']->name }}</h4>
									</div>
								</div></td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

