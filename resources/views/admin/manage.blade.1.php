@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9">	
			<img 
				style="width: 1024; height: 768px;" 
				class="thumbnail" 
				src="{{url($photo->location)}}"
			>
		</div>
	</div>
</div>
@endsection