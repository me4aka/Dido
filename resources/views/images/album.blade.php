@extends('app')

@section('pagetitle')
    <title>Album: {{$album->name}}</title>
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
@stop

@section('content')
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin">Admin</a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::route('create_album_form')}}">Create New Album</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <div class="starter-template">
        <div class="media">
            <img class="media-object pull-left" alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
            <div class="media-body">
                <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                <p>{{$album->name}}</p>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">Album Description:</h2>
                    <p>{{$album->description}}<p>
                        <a href="{{URL::route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Add New Image to Album</button></a>
                    <hr>
                        <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger btn-small">Delete Album</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($album->Photos as $photo)
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="thumbnail">
                    <div class="hovereffect">
                        <img class="img-responsive" alt="{{$album->name}}" src="/albums/{{$photo->image}}">
                        <div class="overlay">
                            <h2>{{$photo->title}}</h2>
                            <p>{{$photo->description}}</p>
                            <div class="pull-left"><a href="{{URL::route('edit_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-primary btn-small">Edit Image </button></a></div>
                            <div class="pull-right"><a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger btn-small">Delete Image </button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop