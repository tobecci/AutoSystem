@extends('layout.app')

@section('content')
<div class="container-fluid h-100 login_page align-items-center justify-content-center d-flex">
<div style="width:100%"
	class="row justify-content-center align-items-center">
	<div class="col col-md-12">

	<div class="text-center" style="color:white">
	<h1><b>Auto System</b></h1>
	</div>

	<div style="margin-left:40%; margin-right:40%"
		class="justify-content-center">
	<form action="{{ route('authenticate') }}" method="POST">
		<div class="form-group">
			{!! csrf_field() !!}
			<input
				class="form-control form-control-lg text-center transparent-input"
				placeholder="Email" type="text" name="email">
		</div>
		<div class="form-group">
			<input
				class="form-control form-control-lg text-center transparent-input"
				placeholder="Password" type="password" name="password">
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-lg btn-block">
				Log In
			</button>
		</div>
	</form>
	<div>


	</div>


</div>

<div style="color:yellow;margin-left:40%;margin-right:40%"
	class="row justify-content-center align-items-center">
	<div class="col-md-12" style="height:50px !important">
		@if (!empty($errors))
			@if(count($errors) > 0)
				@foreach( $errors->all() as $message )
				<div class="display-hide">
				<span>{{ $message }}</span>
				</div>
				@endforeach
			@endif
		@endif
	</div>
</div>




@endsection
