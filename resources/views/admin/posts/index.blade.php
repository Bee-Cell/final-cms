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
	                <td> 
		                @if($post->photo)
						 	<img height="50" src="../{{ $post->photo->file_path }}" alt="user_image"> 
							
		                @else()
			               NO IMAGE YET

		                @endif
	            	</td>
	                {{-- Author with relationship --}}
	                <td>{{ $post->user->name }}</td> 
	                <td>{{ $post->category ? $post->category->category_name : "No Category available" }}</td>
	                <td>{{ $post->content }}</td>
	                <td>{{ $post->created_at->diffForHumans() }}</td>
	                <td>{{ $post->updated_at->diffForHumans() }}</td> 
	        	</tr>

	        	@endforeach
	        @endif

	    </tbody>
	</table>

@stop