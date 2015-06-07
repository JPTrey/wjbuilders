@extends('app')
@section('content')
<div class="container-fluid">
	<a class="btn btn-default" href="{{url('/admin/manage')}}"><span class="glyphicon glyphicon-chevron-left"></span> Back to Manage</a>
	
	<div class="row">
		<div class="col-sm-3 pull-right">
			<h3 class="text-center">Photo Properties</h3>
			{!! Form::open(array('url'=>'/admin/photo/'.$photo->id)) !!}
			{!! Form::label('house', 'House') !!}
			{!! Form::select('house', $house_list, $photo->house_id) !!}
			<br/>
			{!! Form::label('type', 'Show Photo') !!}
			<p>{!! Form::checkbox('house-check', 'house', $photo->house) !!} House Gallery</p>
			<p>{!! Form::checkbox('gallery-check', 'gallery', $photo->gallery)!!} Main Gallery</p>
			<p>{!! Form::checkbox('banner-check', 'banner', $photo->banner)!!} Front Page</p>
			
			{!! Form::submit('Save Changes') !!}

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{!! Form::close() !!}
			
			<a class="btn btn-danger" href="{{url('/admin/delete-photo/'.$photo->id)}}">Delete</a>
		</div>	
		<div class="col-sm-9">	
			<img  
				class="thumbnail img-responsive" 
				src="{{url($photo->location)}}"
			>
		</div>
	</div>
</div>
@endsection