@extends('app')
@section('content')
<div class="container-fluid">
	<h1>Editing '{{$house->name}}'</h1>
	<div class="row">
		<div class="col-sm-3 pull-right">
			<h3>House Properties</h3>
			{!! Form::open(array('url'=>'/admin/edit-house/'.$house->id)) !!}
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', $house->name) !!}
			<br/>
			{!! Form::label('type', 'Project Type') !!}
			{!! Form::select(
				'type', 
				[
					'new' => 'New House',
					'add' => 'Addition',
					'ren' => 'Renovation',
					'dev' => 'Development'
				],
				$house->type
			) !!}
			<br/>
						
			{!! Form::submit('Save Changes') !!}
	
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			
			<a class="btn btn-danger" href="{{url('/admin/delete-house/'.$house->id)}}">Delete</a>
		</div>	
					
	<div class="col-sm-9">
	<h3>All Photos (click to edit)</h3>	
		<!-- get current preview_img -->
		@foreach ($house_imgs as $img)
		@if ($img->location == $house->preview_img)
			<div class="col-sm-2">
				<label for="preview_img">
					<a href="{{url('/admin/photo/'.$img->id)}}">
					<img 
						class="thumbnail img-responsive"
						src="{{url($img->location)}}" 
						style="width: 256px; height: 192px"
						alt="I'm sad"
					/>
					</a>
				</label>
				<p>
				{!! Form::radio('preview_img', $house->preview_img, true, ['class' => 'selected']) !!}
				set as preview photo
				</p>
			</div>	
		@endif
		@endforeach
		
			@foreach ($house_imgs as $img)
			@if ($img->location != $house->preview_img)
				<div class="col-sm-2">
					<label for="preview_img">
						<a href="{{url('/admin/photo/'.$img->id)}}">
						<img 
							class="thumbnail img-responsive"
							src="{{url($img->location)}}" 
							style="width: 256px; height: 192px"
							alt="I'm sad"
						/>
						</a>
					</label>
					<p>
						{!! Form::radio('preview_img', $img->location, false) !!}
					</p>
				</div>
			@endif			
		@endforeach	
		<div class="col-sm-2">
			<a class="btn btn-primary" href="{{url('/admin/upload/'.$house->id)}}">Add New</a>
		</div>
	</div>
@endsection

