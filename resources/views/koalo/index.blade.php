@extends('layouts.app')

@section('pagetitle')
	<title>ACTIVITY request</title>
@stop

@section('content')


	<div class="container-fluid" style="text-align: center; max-width:700px">



			{!! Form::open(array('method'=>'post','action'=>'NewController@store')) !!}

				<div class="input-group">
					{!! Form::text('string', null, array('type'=>'text','class'=>'form-control','placeholder'=>'Type activity')) !!}

				@if(empty($user))
					{!! Form::hidden('user_id',0) !!}
				@else
				{!! Form::hidden('user_id',$user->id) !!}
				@endif
				{!! Form::submit('Find people!', array('class'=>'btn btn-default form-control')) !!}
				</div>
			{!! Form::close() !!}

			@include('errors.list_new')

	</div> <!-- /container -->

@stop