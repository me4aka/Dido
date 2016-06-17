@extends('app')

@section('pagetitle')

	<style>
		body {
			padding-top: 50px;
			padding-left: 100px;
			padding-right: 100px;
		}
		.glyphicon {
			font-size: 20px;
			color: #FFF;
			padding: 0px;
			margin-top: -10px;
		}
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

	<div class="container" style="padding-top: 50px">
		<div class="row">
			<div class="col-sm-8">
				<div class="stripe">
					<div class="desc">
						<h2>DAMIAN BAEV</h2>
						<h5>FINE ARTIST</h5>
					</div>
				</div>
			<img  src="\profile_pics\{{$user->profile_pic}}" alt="" style="max-width: 100%;">
			</div>
			<div class="col-sm-4">{{nl2br($user->about_me)}}</div>
		</div>
	</div>
@stop