@if(session('action'))
	<div class="alert alert-{{ session('status') ? 'primary' : 'danger'}} alert-dismissible fade show" role="alert">
		{{session('msg')}}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
