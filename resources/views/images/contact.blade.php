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
	</style>
	<title>Damian Baev</title>
@stop

@section('content')
	@include('images.webheader')

	<div id="contact" class="container-fluid bg-gray">
		<h2 class="text-center" style="visibility: hidden">CONTACT</h2>
		<div class="row">
			<div class="col-sm-5">
				<p>Contact:</p>
				@if($user->address)
					<p><span class="glyphicon glyphicon-map-marker logo contact-logo"></span> {{$user->address}}</p>
				@endif
				@if($user->tel)
					<p><span class="glyphicon glyphicon-phone-alt logo contact-logo"></span> {{$user->tel}}</p>
				@endif
				@if($user->mobile)
					<p><span class="glyphicon glyphicon-phone logo contact-logo"></span> {{$user->mobile}}</p>
				@endif
				@if($user->contact_mail)
					<p><span class="glyphicon glyphicon-envelope logo contact-logo"></span>{{$user->contact_mail}}</p>
				@endif
			</div>
			<div class="col-sm-7">
				@include('errors.list_new')

				@if(Session::has('message'))
					<div class="alert alert-info">
						{{Session::get('message')}}
					</div>
				@endif

				{!! Form::open(array('route'=>'contact_store', 'class'=>'form')) !!}
					<div class="row">
						<div class="col-sm-6 form-group">
							{!! Form::text('name', null, array('required','class'=>'form-control','placeholder'=>'Your name')) !!}
						</div>
						<div class="col-sm-6 form-group">
							{!! Form::text('email', null, array('required','class'=>'form-control','placeholder'=>'Your E-Mail Address')) !!}
						</div>
					</div>
				{!! Form::textarea('message', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your message')) !!}
					<br/>
					<div class="row">
						<div class="col-sm-10 form-group">
						</div>
						<div class="col-sm-2 form-group">
							{!! Form::submit('Contact me!', array('class'=>'btn btn-primary pull-right')) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop