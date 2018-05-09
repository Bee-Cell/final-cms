@extends("layouts.admin")

@section("content")

	<h1 class="page-header"> Posts </h1>
	<table class="table table-bordered table-hover">
	    <thead>
	        <tr>
	            <th>Post Id</th>
	            <th>Post Title </th>
	            <th>Photo</th>
	            <th>Author</th>
	            <th>Post Category</th>
	            <th>Content</th>
	            <th>Created At</th>
	            <th>Update At</th>

	           
	        </tr>
	    </thead>
	
	    <tbody>
	        
	         @if($posts)

	         	@foreach($posts as $post)


	             <tr>
	                <td>{{ $post->id }}</td>
	                <td>{{ $post->title }}</td>
	                <td>{{ $post->photo_id }}</td>
	                <td>{{ $post->user_id }}</td>
	                <td>{{ $post->category_id }}</td>
	                <td>{{ $post->content }}</td>
	                <td>{{ $post->created_at->diffForHumans() }}</td>
	                <td>{{ $post->updated_at->diffForHumans() }}</td> 
	        	</tr>

	        	@endforeach
	        @endif

	    </tbody>
	</table>

@stop