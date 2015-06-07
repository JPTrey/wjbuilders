@extends('app')
@section('content')

{{-- 
Variables: 
	$house_list[]: collection of house_id/name tuples
	
Posts:
	'file': image jpeg to be uploaded; store location with Photo
	'house': assigns house_id to Photo	
	'type': assigns type for new House placement
	'house-check': assigns photo to house gallery
	'gallery-check': assigns photo to main gallery
	'banner-check': assigns photo to front page
--}}


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<div class="container">
	<a class="btn btn-default" href="{{url('/admin/manage')}}"><span class="glyphicon glyphicon-chevron-left"></span> Back to Manage</a>
	
	<div class="row">
		<div class="col-sm-4 pull-right">
			@if (isset($success))
			<img class="thumbnail img-responsive" src="{{url($photo_url)}}">
			<p class="text-center success">{{$success}}</p>
			@endif
		</div>	
		
		<div class="col-sm-8">
			
			<h1>Upload Photo</h1>
			
			{!! Form::open(array('url'=>'/admin/upload','files'=>true)) !!}
			
			<h4>Step 1: Select the photo from your computer</h4>
			
			{!! Form::label('file', 'Image File (.jpg or .png only)', array('id'=>'','class'=>'')) !!}
			<br/>
			{!! Form::file('file','',array('id'=>'','class'=>'')) !!}
			<br/>
			
			<h4>Step 2: Choose which house is depicted in the photo</h4>
			
			{!! Form::label('house', 'Select House') !!}
			<br/>
			{!! Form::select(
				'house', 
				$house_list,
				$house_id
			) !!}
			<br/>
			
			@if (sizeof($house_list) < 2) 
			<h4>You haven't added any houses. Input the name of the new house</h4>
			{!! Form::text('new_house', '', ['placeholder' => 'House Name']) !!}
			@else
			<h4 id="step-2a" class="hidden">Step 2a: Input the name of the new house</h4>
			{!! Form::text('new_house', '', ['id' => 'new_house','placeholder' => 'House Name', 'class' => 'hidden']) !!}
			@endif
			
			<br/>
			
			{!! Form::label('type', 'Project Type', ['id' => 'type-label','class' => 'hidden']) !!}
			<br/>
			{!! Form::select(
				'type', 
				[
					'new' => 'New House',
					'add' => 'Addition',
					'ren' => 'Renovation',
					'dev' => 'Development'
				],
				'new',
				[
				'id' => 'type', 
				'class' => 'hidden'
				]
			) !!}
			<br/>
			
			<h4>Step 3: Choose where this photo should be placed</h4>
			{!! Form::label('type', 'Select one or more') !!}
			
			<p>{!! Form::checkbox('house-check', 'house', true) !!} House Gallery</p>
			<p>{!! Form::checkbox('gallery-check', 'gallery')!!} Main Gallery</p>
			<p>{!! Form::checkbox('banner-check', 'banner', false, ['id' => 'banner-check'])!!} Front Page</p>
			<br/>
			<h4 id="step-3a" class="hidden">Step 3a: (Optional) Add a caption to this picture</h4>
			{!! Form::text('featured_text', '', 
				[
				'id' => 'featured_text',
				'placeholder' => 'e.g. 	About Me', 
				'class' => 'hidden'
				]
			) !!}
			<br/>
			{!! Form::submit('Upload') !!}
			{!! Form::close() !!}
		</div>	
	</div>
</div> <!-- END upload form -->

<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			
			// show hidden fields when appropriate
			$('#house').change(function() {
				if ($('#house').val() == 0) {
					$('#step-2a').removeClass('hidden');
					$('#type').removeClass('hidden');
					$('#type-label').removeClass('hidden');
					$('#new_house').removeClass('hidden');
				} else {
					$('#step-3a').addClass('hidden');
					$('#type').addClass('hidden');
					$('#type-label').addClass('hidden');
					$('#new_house').addClass('hidden');
				}	
			});
		
		$('#banner-check').change(function() {
			if ($('#banner-check').is(':checked')) {
				$('#step-3a').removeClass('hidden');
				$('#featured_text').removeClass('hidden');
			} else {
				$('#step-3a').addClass('hidden');
				$('#featured_text').addClass('hidden');
			}
		});
	});
})(jQuery);
</script>
@endsection