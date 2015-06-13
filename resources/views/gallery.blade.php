@extends('main')
@section('title') All Houses @stop

{{-- 
Variables:

$banners[]: dictionary of banner image urls; gets urls from 'banners' table
$banners['new']: dictionary cell for new constructions banner
$banners['add']: dictionary cell for additions banner
$banners['ren']: dictionary cell for renovations banner
$banners['dev']: dictionary cell for developments banner

$new_houses[]: 
$add_houses[]: 
$ren_houses[]: 
$dev_houses[]: 
--}}

@section('body')

<h1>Before and After</h1>

<div class="row">
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/bernersville-alt.jpg')}}"/>
	</div>
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/bernersville.jpg')}}"/>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/westfield-alt.jpg')}}"/>
	</div>
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/westfield.jpg')}}"/>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/sgro-alt.jpg')}}"/>
	</div>
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/sgro.JPG')}}"/>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/renovation2-alt.JPG')}}"/>
	</div>
	<div class="col-xs-6">
		<img class="img-responsive thumbnail preview" style="height: 400px" src="{{url('/img/thumbnails/renovation2.JPG')}}"/>
	</div>
</div>

@if (isset($banners))
<!-- New Houses -->
<div class="banner" style="background: url('{{$banners['new']}}')">
</div>
@endif
	<h1 class="parallax-text">New Constructions</h1>

<div class=row>
	@foreach ($new_houses as $house)
		<div class="col-xs-3">
			<a href="{{url('/house/'.$house->id)}}">
				<img class="img-responsive thumbnail preview" src="{{url($house->preview_img)}}"/>
			</a>
		</div>
	@endforeach
</div>
<!-- END New Houses-->

	<h1 class="parallax-text">Additions</h1>
@if (isset($banners))
<!-- Additions -->
<div class="banner" style="background: url('{{$banners['add']}}')">
</div>
@endif
<div class=row>
	@foreach ($add_houses as $house)
		<div class="col-xs-3">
			<a href="{{url('/house/'.$house->id)}}">
				<img class="img-responsive thumbnail preview" src="{{url($house->preview_img)}}"/>
			</a>
		</div>
	@endforeach
</div>
<!-- END Additions-->

	<h1 class="parallax-text">Renovations</h1>
@if (isset($banners))
<!-- Renovations -->
<div class="banner" style="background: url('{{$banners['ren']}}')">
</div>
@endif
<div class=row>
	@foreach ($ren_houses as $house)
		<div class="col-xs-3">
			<a href="{{url('/house/'.$house->id)}}">
				<img class="img-responsive thumbnail preview" src="{{url($house->preview_img)}}"/>
			</a>
		</div>
	@endforeach
</div>
<!-- END Renovations-->

	<h1 class="parallax-text">Developments</h1>
@if (isset($banners))
<!-- Developments -->
<div class="banner" style="background: url('{{$banners['dev']}}')">
</div>
@endif
<div class=row>
	@foreach ($dev_houses as $house)
		<div class="col-xs-3">
			<a href="{{url('/house/'.$house->id)}}">
				<img class="img-responsive thumbnail preview" src="{{url($house->preview_img)}}"/>
			</a>
		</div>
	@endforeach
</div>
<!-- END Developments-->
@stop
