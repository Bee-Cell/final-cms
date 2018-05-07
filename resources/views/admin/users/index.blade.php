@extends("../../layouts.admin")

@section('content')

		<h1 class="page-header">Users</h1>

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
		            
		           
		        </tr>
		    </thead>
		
		    <tbody>
	        @if($users)
		        @foreach($users as $user)

		        <tr>
	                <td>{{ $user->id }}</td>

	                @if($user->photo)
						<td> <img height="50" src="{{ $user->photo->file_path }}" alt="user_image"> 
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

	                    
		        </tr>

		        @endforeach
		    @endif
	    

	            
		    </tbody>
		</table>
@stop