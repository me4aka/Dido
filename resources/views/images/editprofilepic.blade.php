@extends('app')

@section('pagetitle')
	<title>Admin Page</title>
@stop

@section('content')

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/admin">Admin</a>
			<ul class="nav navbar-nav">
				<li><a><span style="color: #ffffff;">Edit profile picture</span></a></li>
			</ul>
		</div>
	</div>

	<div class="container-fluid" style="text-align: center;">
		<div class="span4" style="display: inline-block;margin-top:100px;">

			@include('errors.list_new')

			<fieldset>
				<legend>Edit profile picture</legend>

				{!! Form::model($user,(['method' => 'patch', 'action' => 'ExtendedUserController@patchPictureUpdate', 'enctype'=>'multipart/form-data'])) !!}

				<div class="form-group">
					{!! Form::label('profile_pic','Select a profile picture:') !!}
					{!! Form::file('profile_pic') !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Edit profile picture!', ['class'=>'btn btn-primary form-control']) !!}
				</div>

				{!! Form::close() !!}

			</fieldset>

@stop