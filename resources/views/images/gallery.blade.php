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

<div class="container-fluid">

    <div class="row">
        @foreach($albums as $album)
            @foreach($album->Photos as $photo)
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="thumbnail rect">
                        <a href="/albums/{{$photo->image}}"><div class="hovereffect">
                            <img style="clip: rect(0px,400px,300px,0px)" class="img-responsive" alt="{{$album->name}}" src="/albums/{{$photo->image}}">
                            <div class="overlay">
                                <h2>{{$photo->title}}</h2>
                                <p>{{$photo->description}}</p>
                            </div>
                        </div></a>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

@stop
