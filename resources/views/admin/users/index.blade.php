@extends("../../layouts.admin")

@section('content')

		<h1 class="page-header">Users</h1>
		@if( Session::has("deleted_user"))
		
			<div class="alert alert-danger" role="alert">
			  <p class="">{{ session("deleted_user") }}</p>
			</div>

		@elseif( Session::has("inserted_user"))
			
			<div class="alert alert-info" role="alert">
			  <p class="">{{ session("inserted_user") }}</p>
			</div>
			
		@endif

		<table class="table table-bordered table-hover">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Image</th>
		            <th>Name </th>
		            <th>Email</th>
		            <th>Role</th>
		            <th>Is Active</th>
		            <th>Created</th>
		            <th>Updated</th>
		            <th>EDIT </th>
		            <th>DELETE</th>
		            
		           
		        </tr>
		    </thead>
		
		    <tbody>
	        @if($users)
		        @foreach($users as $user)

		        <tr>
	                <td>{{ $user->id }}</td>

	                @if($user->photo)
						<td> <img height="50" src="../{{ $user->photo->file_path }}" alt="user_image"> 
						</td>
	                @else()
		                <td>NO IMAGE YET</td>

	                @endif
	                
	                <td>{{ $user->name }}</td>
	                <td>{{ $user->email }}</td>
	                <td>{{ $user->role ? $user->role->name : "NO ROLE YET" }}</td>
	                <td>{{ $user->is_active == 1 ? 'ACTIVE' : 'N|ACTIVE' }}</td>
	                <td>{{ $user->created_at->diffForHumans() }}</td> 
	                <td>{{ $user->updated_at->diffForHumans() }}</td>

	                <td>
	                	<a class="btn btn-info" href="{{ route("users.edit", $user->id) }}">EDIT</a> 
	                	
        			</td>
        			<td>
        				{!! Form::open(["action" => ["AdminUserController@destroy", $user->id] , "method" => "DELETE"]) !!}
        	
        				{{ csrf_field() }}
        				
        				{!! Form::submit("DELETE" , ["class" => "btn btn-danger"]) !!}
        				
        				{!! Form::close() !!}
        			</td>


	                    
		        </tr>

		        @endforeach
		    @endif
	    

	            
		    </tbody>
		</table>
@stop