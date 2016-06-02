@extends('common')
@section('content')
<div id="page-wrapper">
	<div class="row">
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
		<div class="col-lg-12">
			<h1 class="page-header">Welcome to the Dashboard!</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
@stop