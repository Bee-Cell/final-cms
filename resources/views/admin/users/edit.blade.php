@extends('layouts.admin')

@section('content')
		<h1 class="page-header">Edit the existing Users</h1>

		<div class="row">
			<div class="col-sm-3">
				<img src="../../{{ $user->photo ? $user->photo->file_path : "../images/1525718244Capture.PNG" }}" alt="The user image" class="img-responsive img-rounded">
				
			</div>
			
			
			<div class="col-sm-9">
				{!! Form::model($user, ["action" => array("AdminUserController@update", $user->id) , "method" => "PATCH", "files" =>  true]) !!}

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
					{!! Form::select("role_id",$roles, null, ["class" => "form-control" ]) !!}
				</div>

				<div class="form-group">

					{!! Form::label('is_active', 'Status') !!}
					{!! Form::select("is_active",array(1 => "ACTIVE", 2 => "N?ACTIVE"),null, ["class" => "form-control" ]) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password("password", ["class" => "form-control" , "placeholder" => "Enter an Password "]) !!}
				</div>

				<div class="form-group">
					{!! Form::label('file', 'Files') !!}
					{!! Form::file("photo_id",null, ["class" => "form-control" , "placeholder" => "Enter an Password "]) !!}
				</div>


				
				<div class="form-group">
					{!! Form::submit("Edit Existing User", ["class" => "btn btn-primary"]) !!}
				</div>
				

				{!! Form::close() !!}
			</div>
		</div>
	

			

@include("includes.displayFormError")


@endsection