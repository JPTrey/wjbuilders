@extends('main')
@section('title') Viewing House @stop
@section('body')
<div class="jcarousel-wrapper">
    <div class="jcarousel">
        <ul>
            @foreach ($photos as $photo)
            <li style="background: url('{{url($photo->location)}}');"></li>
            @endforeach
        </ul>
        
    </div>
    <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
    <a href="#" class="jcarousel-control-next">&rsaquo;</a>    
    <p class="jcarousel-pagination">
</div>
@section('post-scripts')
<link rel="stylesheet" type="text/css" href="{{asset('/css/jcarousel.transitions.css')}}"/>

<!-- jCarousel -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel-autoscroll.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel-control.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel-core.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel-pagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel-scrollintoview.min.js"></script>-->
<script src="{{asset('/js/modernizr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.3/jquery.jcarousel.min.js"></script>
<script src="{{asset('/js/carousel.transitions.js')}}"></script>
@stop
@stop