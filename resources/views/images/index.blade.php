@extends('app')

@section('pagetitle')

	<style>
		body {
			padding-top: 50px;
			padding-left: 100px;
			padding-right: 100px;
			background-color: ghostwhite;
		}
		.glyphicon {
			font-size: 20px;
			color: #FFF;
			padding: 0px;

		}

		 .carousel-inner > .item > img,
		 .carousel-inner > .item > a > img {
			clip: rect(0,1000px,600px,0);
			overflow: hidden;

		 }

		.carousel-inner > .item
		{
			-webkit-transition: 1s ease-in-out left;
			-moz-transition: 1s ease-in-out left;
			-o-transition: 1s ease-in-out left;
			transition: 1s ease-in-out left;
		}

		.carousel-inner
		{
			min-width: 1000px;
			max-height: 600px;
			margin: auto;
		}


		/* All Mobile Sizes (devices and browser) */
		@media only screen and (max-width: 767px) {
			body {
				padding-top: 50px;
				padding-left: 0px;
				padding-right: 100px;
			}
		}
	</style>

	<title>Damian Baev</title>
@stop

@section('content')
	@include('images.webheader')

	<div class="container">
		<br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!--<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol> -->

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="stripe">
					<div class="desc">
						<h2>DAMIAN BAEV</h2>
						<h5>FINE ARTIST</h5>
					</div>
				</div>

				@foreach($mainimages as $mainimage)
					<div class="item active" >
						<img  src="/albums/{{$mainimage->image}}" alt="{{$mainimage->title}}">
					</div>

				@foreach($images as $image)
					@if( $image->title !== $mainimage->title )
						<div class="item" >
							<img src="/albums/{{$image->image}}" alt="{{$image->title}}">
						</div>
					@endif
				@endforeach
				@endforeach
			</div>

			<!-- Left and right controls -->
			<!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a> -->

		</div>
	</div>

@stop