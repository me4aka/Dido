@extends('app')

@section('pagetitle')
	<title>Edit image</title>
@stop

@section('content')

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/admin">Admin</a>
				<ul class="nav navbar-nav">
					<li><a>Edit Image</a></li>
				</ul>
		</div>
	</div>

	<div class="container-fluid" style="text-align: center;">
		<div class="span4" style="display: inline-block;margin-top:100px;">

			@include('errors.list_new')

			<fieldset>
			<legend>Edit image {{$image->title}}</legend>

			{!! Form::model($image,(['method' => 'patch', 'action' => 'ImagesController@patchUpdate'])) !!}
			<div class="form-group">
				{!! Form::label('title','Image Title: ') !!}
				{!! Form::text('title', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('description','Image Description: ') !!}
				{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('album_id','Select Album: ') !!}

				<select name="album_id">
					@foreach($albums as $others)
						@if($others->id == $image->album_id)
							<option value="{{$others->id}}" selected>{{$others->name}}</option>
						@else
						<option value="{{$others->id}}">{{$others->name}}</option>
						@endif
					@endforeach
				</select>

			</div>

				@if($image->carousel == 1)

					<input type="hidden" name="carousel" value="0" />

					<div class="form-group">
						{!! Form::label('carousel','Show in carousel: ') !!}
						{!! Form::checkbox('carousel', '1', true) !!}
					</div>
				@else

					<input type="hidden" name="carousel" value="0" />

					<div class="form-group">
						{!! Form::label('carousel','Show in carousel: ') !!}
						{!! Form::checkbox('carousel', '1', null) !!}
					</div>
				@endif

			<div class="form-group">
				{!! Form::hidden('id', $image->id) !!}
			</div>

			<div class="form-group">
				{!! Form::hidden('image', $image->image) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Edit Image!', ['class'=>'btn btn-primary form-control']) !!}
			</div>

			{!! Form::close() !!}

			</fieldset>

@stop




