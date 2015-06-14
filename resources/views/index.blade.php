@extends('main')
@section('title')Woody Jones Builders @stop

@section('body')
</div> <!-- close container -->
<div class="container-fluid">

<div class="row">
	<div id="main-banner"
		style="
			background: transparent url('{{url('/img/ren/IlXIns3uox/GXZpNHSqTP')}}');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-position: left center;
			background-size: cover;

			height: 960px;
		    color: #FFF;
		    padding: 0 0 0 0;
		
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
			margin: 0 0 0 0;
    		padding: 0 0 0 0;
			"
		>
			<h1 class="text-center" id="profile-caption" style="font-size: 5em">Proud Northern Jersey-based home builder since 1985</h1>
			<a style="margin-left: 45%; font-size: 2em" href="{{url('/gallery')}}"<h1 class="text-center" id="profile-caption" style="font-size: 2em; padding-top: 0">View Portfolio <span class="glyphicon glyphicon-chevron-right"></span></h1></a>
	</div>
</div>	
	
<div class="row">	
	<div id="gallery-banner">
		<div id="main-banner"
		style="
			background: transparent url('{{url('/img/2.JPG')}}');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-position: left center;
			background-size: cover;

			height: 960px;
		    padding: 0 0 0 0;
		
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
			margin: 0 0 0 0;
    		padding: 0 0 0 0;
			"
		>
		<h1 class="text-center" id="profile-caption" style="font-size: 5em;">Winner of the 1991<br/>Builder of the Year award</h1>
		<a style="margin-left: 45%; font-size: 2em" href="{{url('/about')}}"<h1 class="text-center" id="profile-caption" style="font-size: 2em; padding-top: 0">About me <span class="glyphicon glyphicon-chevron-right"></span></h1></a>
				
	</div>
		{{--<a class="btn btn-primary" href="{{action('GalleryController@showGalleries', null)}}">View Gallery</a>--}}
	</div>		
</div>
	
<div class="row">	
	<div id="about-banner">
		<div id="main-banner"
		style="
			background: transparent url('{{url('/img/2-carousel.jpg')}}');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-position: left center;
			background-size: cover;

			height: 960px;
		    color: #;
		    padding: 0 0 0 0;
		
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
			margin: 0 0 0 0;
    		padding: 0 0 0 0;
			"
		>
			<h1 class="text-center" id="profile-caption" style="font-size: 5em">A-rating from the<br/>Better Business Bureau</h1>
	</div>
		{{--<a class="btn btn-primary" href="{{url('/about')}}">About Me</a>--}}
	</div>
</div>
	
<div class="row">	
	<div id="contact-banner">
		<div id="main-banner"
		style="
			background: transparent url('{{url('/img/14.jpg')}}');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-position: left center;
			background-size: cover;

			height: 960px;
		    color: #FFF;
		    padding: 0 0 0 0;
		
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
			margin: 0 0 0 0;
    		padding: 0 0 0 0;
			"
		>
			<h1 class="text-center" id="profile-caption" style="font-size: 5em">Specializes on all stages of construction and renovation</h1>
	</div>
		{{--<a class="btn btn-primary" href="{{url('/contact')}}">Contact Me</a>--}}
	</div>
</div>
@stop
