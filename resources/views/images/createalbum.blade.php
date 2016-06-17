@extends('app')

@section('pagetitle')
    <title>Create an Album</title>
@stop

@section('content')
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <a class="navbar-brand" href="/admin">Admin</a>
        <ul class="nav navbar-nav">
            <li><a>Create Album</a></li>
        </ul>
    </div>
</div>
<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">

        @include('errors.list_new')

        {!! Form::open(array('name'=>'createnewalbum', 'method'=>'post', 'action'=>'AlbumsController@postCreate', 'enctype'=>'multipart/form-data', 'files'=>'true')) !!}
        <fieldset>
            <legend>Create an Album</legend>
            <div class="form-group">
                {!! Form::label('name','Album name') !!}
                {!! Form::text('name', null, array('type'=>'text','class'=>'form-control','placeholder'=>'Album name')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description','Album Description') !!}
                {!! Form::text('description', null, array('type'=>'text','class'=>'form-control','placeholder'=>'Album description')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cover_image','Select a Cover Image') !!}
                {!! Form::file('cover_image') !!}
            </div>
            {!! Form::submit('Add Image!', array('class'=>'btn btn-primary form-control')) !!}
        </fieldset>
        {!! Form::close() !!}

    </div>
</div> <!-- /container -->
@stop