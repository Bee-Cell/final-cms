@extends("layouts.admin")

@section("content")

	<h1 class="page-header"> Create New Posts  </h1>
	

	<div class="form">
		{!! Form::open(["action" => "AdminPostController@store" , "method" => "POST", "files" => true]) !!}

		{{ csrf_field() }}

		<div class="form-group">
			{!! Form::label('title', 'Title') !!} 
			{!! Form::text("title", null, ["class" => "form-control", "placeholder" => "Enter your Post Title"]) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('category_id', 'Category') !!}
			{{-- array("" => "Choose Options")+$roles --}}
			{!! Form::select("category_id",array("" => "Choose Options")+$categories, null, ["class" => "form-control" ]) !!}
		</div>

		<div class="form-group">
			{!! Form::label('picture', 'Thumbnail') !!}
			{!! Form::file("photo_id") !!}
		</div>
		<div class="form-group">
			{!! Form::label('content', 'Content') !!}
			{!! Form::textarea("content", null, ["class" => "form-control", "rows" => "7"]) !!}
		</div>


		
		<div class="form-group">
			{!! Form::submit("Add New Post", ["class" => "btn btn-primary"]) !!}
		</div>
		

		{!! Form::close() !!}
	</div>

@include("includes.displayFormError")
@stop