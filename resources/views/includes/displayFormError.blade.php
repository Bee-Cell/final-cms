{{-- For displaying erros in the forms --}}
				@if(count($errors) > 0)
					
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)

								<li> {{ $error }} </li>


							@endforeach
						</ul>
					</div>

				@endif
		
