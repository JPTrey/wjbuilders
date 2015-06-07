@extends('app')
@section('content')
<div class="container-fluid">
	<h1>Photo Management</h1>
	
	<h2>Front Page</h2>
	<hr/>
	
	<h2>All Houses</h2>
	<div class="row">
		@foreach ($all_houses as $house)
		<div class="col-sm-2">
			<img 
				class="thumbnail img-responsive" 
				src="{{url($house->preview_img)}}"
				alt="No image set"
			>
			<h4 class="text-center">{{$house->name}} 
				<a href="{{url('/admin/edit-house/'.$house->id)}}"><span class="glyphicon glyphicon-wrench"></span></a>	
			</h4>
				
		</div>		
		@endforeach
	</div>
	<hr/>
	
	<h2>All Photos</h2>
	<div class="container-fluid col-sm-offset-1">
	@foreach ($all_houses as $house)
	<div class="row panel">
		<h2 class="manage-house">{{$house->name}} 
			<a href="{{url('/admin/edit-house/'.$house->id)}}"><span class="glyphicon glyphicon-wrench"></span></a>
			<a href="{{url('/admin/upload/'.$house->id)}}"><span class="glyphicon glyphicon-plus"></span></a>
		</h2>
		@foreach ($all_imgs as $img)
			@if ($img->house_id == $house->id)
				<div class="col-sm-2">	
					<a href="{{url('/admin/photo/'.$img->id)}}">
						<img 
							class="thumbnail img-responsive" 
							src="{{url($img->location)}}"
						>
					</a>
				</div>	
			@endif
		@endforeach
	</div>	
	@endforeach
	</div>
@endsection

