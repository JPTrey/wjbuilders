@extends('main')
@section('title')About Me @stop
@section('body')

</div>
	<div 
		style="
			background: transparent url('{{url('/img/wj_profile.jpg')}}');
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
			<h1 class="text-center" id="profile-caption">About Me</h1>

		</div>
<div class="contrainer-fluid">		
<div class="row">
<!--	<img class="img img-responsive" src="img/wj_profile.jpg" />-->
	<div class="text-center">
		<h4 class="hidden-sm hidden-md hidden-lg" id="profile-caption-sm">About Me</h4>
	</div>
</div>

<div class="row text-block">
	<div class="col-xs-10 col-xs-offset-1" id="history-text">
		<h1>A <span style="color: red;">History</span> of Excellence.</h1>
		<h2>I have been building beautiful homes since 1985.</h2>
		<h2>Starting with single-family constructions and additions,
		I graduated towards whole housing developments in 1988, finishing that year with three entire developments completed
		under my supervision. A fourth development followed in 1990, and I completed my very own development in 2005.
		I managed the road layout and site work for each project.</h2>
		<h2>After being honored as the New Jersey Builder of the Year in 1992, I turned my attention back to individual houses, 
		expanding my portfolio to encompass very large, highly customized, and thoroughly complex exterior and interior designs.</h2>
		<h2>With two decades of experience, I have an extensive understanding of all aspects of construction, of all shapes and sizes. 
		Whatever your needs, I can turn it into the house of your dreams.</h2>
	</div>	
</div>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1" id="awards-text">	
		<h1><span style="color: red;">Recognized</span> by the Builders' Community.</h1>
		<h2>The Builders' Associatiation of New Jersey has awarded me the following dinstinctions:</h2>
		<ul>
			<li class="item"><span class="glyphicon glyphicon-star"></span> Award (Year)</li>
			<li class="item"><span class="glyphicon glyphicon-star"></span> Award (Year)</li>
			<li class="item"><span class="glyphicon glyphicon-star"></span> Award (Year)</li>
			<li class="item"><span class="glyphicon glyphicon-star"></span> Award (Year)</li>
			<li class="item"><span class="glyphicon glyphicon-star"></span> Award (Year)</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1" id="quotes-text">	
		<h1><span style="color: red;">Past Customers</span> Appreciate My Work, Too.</h1>
		<blockquote>
			<p>"Righteous dude."</p>
			<footer class="quote-source">Some dude</footer>
		</blockquote>
		<blockquote>
			<p>"S'alright."</p>
			<footer class="quote-source">Some dude</footer>
		</blockquote>
		<blockquote>
			<p>"...What a piece of...good...builder...man.</p>
			<footer class="quote-source">Some dude</footer>
		</blockquote>
	</div>
</div>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1" id="quotes-text">	
		<h1>Want to Know More? <a href="mailto:wjbuilders@gmail.com"><span style="color: red; text-decoration: underline;">Email</span></a> Me!</h1>
		<h2>Or use my <a href="{{url('/contact')}}">Contact Form</a>, if you want to get started immediately.</h2>
	</div>
</div>

@stop