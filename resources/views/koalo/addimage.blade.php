@extends('app')

@section('pagetitle')
    <title>Add image to album</title>
@stop

@section('content')

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <a class="navbar-brand" href="/admin">Admin</a>
            <ul class="nav navbar-nav">
                <li><a>Add Image</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid" style="text-align: center;">
        <div class="span4" style="display: inline-block;margin-top:100px;">

            @include('errors.list_new')

            {!! Form::open(array('method'=>'post', 'action'=>'ImagesController@postAdd', 'enctype'=>'multipart/form-data')) !!}
                <fieldset>
                    <legend>Add an Image to {{$album->name}}</legend>
                    <div class="form-group">
                        {!! Form::label('title','Image Title') !!}
                        {!! Form::text('title', null, array('type'=>'text','class'=>'form-control','placeholder'=>'Image Title')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description','Image Description') !!}
                        {!! Form::textarea('description', null, array('class'=>'form-control','type'=>'text','placeholder'=>'Image Description')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image','Select an Image') !!}
                        {!! Form::file('image') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('carousel','Show in carousel: ') !!}
                        {!! Form::checkbox('carousel', '1', null, ['class'=>'form-control']) !!}
                    </div>

                    {!! Form::hidden('album_id',$album->id) !!}

                    {!! Form::submit('Add Image!', array('class'=>'btn btn-primary form-control')) !!}
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div> <!-- /container -->

@stop