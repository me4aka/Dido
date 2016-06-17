@extends('app')

@section('pagetitle')
  <title>Admin Page</title>

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

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="/admin">Admin</a>

      <div class="navbar-collapse collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a href="{{URL::route('create_album_form')}}"><u>Create New Album</u></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/admin/profile') }}"><i class="fa fa-user fa-fw"></i>Profile</a></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
    </div>
  </div>
  </div>
    <div class="container">

     <div class="starter-template">
        <div class="row">
          @foreach($albums as $album)
            <div class="col-lg-3">
              <div class="thumbnail" style="min-height: 514px;">
                <img src="/albums/{{$album->cover_image}}" alt="{{$album->name}}">
                <div class="caption">
                  <h3>{{$album->name}}</h3>
                  <p>{{$album->description}}</p>
                  <p>{{count($album->Photos)}} image(s).</p>
                  <p>Created date: {{date("d F Y", strtotime($album->created_at)) }}</p>
                  <p><a href="{{ URL::route('show_album',array('id'=>$album->id)) }}" class="btn btn-big btn-default">Show Gallery</a></p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
     </div> <!-- /.container -->
    </div>

 @stop