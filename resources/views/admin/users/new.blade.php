@extends('layouts.admin')

@section('content')
		<h1 class="page-header">Create Users</h1>
		
		{{-- validation can be done throughcreating roles throough request php artisan make:request requestname--}}

		{{-- enctype=multipart/formdata  for files is enable with files ture--}}
		<div class="form">
			{!! Form::open(["action" => "AdminUserController@store" , "method" => "POST", "files" =>  true]) !!}

			{{ csrf_field() }}

			<div class="form-group">
				{!! Form::label('name', 'Name') !!} 
				{!! Form::text("name", null, ["class" => "form-control", "placeholder" => "Enter Your The Name"]) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email("email", null, ["class" => "form-control" , "placeholder" => "Enter an Email "]) !!}
			</div>

			<div class="form-group">

				{!! Form::label('role_id', 'Role') !!}
				{!! Form::select("role_id",array("" => "Choose Options")+$roles, null, ["class" => "form-control" ]) !!}
			</div>

			<div class="form-group">

				{!! Form::label('is_active', 'Status') !!}
				{!! Form::select("is_active",array(1 => "ACTIVE", 2 => "N?ACTIVE"),0, ["class" => "form-control" ]) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password("password", ["class" => "form-control" , "placeholder" => "Enter an Password "]) !!}
			</div>

			<div class="form-group">
				{!! Form::label('file', 'Files') !!}
				{!! Form::file("photo_id",null, ["class" => "form-control" ]) !!}
			</div>


			
			<div class="form-group">
				{!! Form::submit("Add New User", ["class" => "btn btn-primary"]) !!}
			</div>
			

			{!! Form::close() !!}
		</div>	

@include("includes.displayFormError")


@endsection