@extends('app')

@section('pagetitle')
	<title>Admin Page</title>
@stop

@section('content')

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/admin">Admin</a>
			<ul class="nav navbar-nav">
				<li><a><span style="color: #ffffff;">Edit Profile</span></a></li>
			</ul>
		</div>
	</div>

	<div class="container-fluid" style="text-align: center;">
		<div class="span4" style="display: inline-block;margin-top:100px;">

			@include('errors.list_new')

			<fieldset>
				<legend>Edit profile</legend>

				{!! Form::model($user,(['method' => 'patch', 'action' => 'ExtendedUserController@patchUpdate'])) !!}
				<div class="form-group">
					{!! Form::label('about_me','About me: ') !!}
					{!! Form::textarea('about_me', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('contact_mail','Email for contacts: ') !!}
					{!! Form::text('contact_mail', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('tel','Telephone: ') !!}
					{!! Form::text('tel', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('mobile','Mobile: ') !!}
					{!! Form::text('mobile', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('address','Address: ') !!}
					{!! Form::text('address', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('url_1','URL 1: ') !!}
					{!! Form::text('url_1', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('url_2','URL 2: ') !!}
					{!! Form::text('url_2', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('url_3','URL 3: ') !!}
					{!! Form::text('url_3', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Edit profile!', ['class'=>'btn btn-primary form-control']) !!}
				</div>

				{!! Form::close() !!}

			</fieldset>

@stop