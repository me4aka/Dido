@extends('app')

@section('pagetitle')
	<title>Admin Page</title>
@stop

@section('content')

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/admin">Admin</a>
			<ul class="nav navbar-nav">
				<li><a><span style="color: #ffffff;">Profile</span></a></li>
			</ul>
		</div>
	</div>

	<div class="container-fluid" style="text-align: left; margin-top:100px;">
		<div class="row">
			<div class="col-md-2">
					<div id="pic-holder">
						@if($user->profile_pic)
						<img src="/profile_pics/{{$user->profile_pic}}" alt="">
						@endif
					</div>
					<a href="editprofilepic" class="btn btn-sm btn-primary" style="margin-bottom: 10px;margin-left: 25px"><i class="fa fa-pencil"></i> Edit picture</a></br>
					<a href="editprofile" class="btn btn-md btn-primary" style="margin-bottom: 10px;margin-left: 20px"><i class="fa fa-pencil"></i> Edit profile</a>
			</div>
			<div class="col-md-10">
				<table class="table table-hover table-responsive table-borderless">
					<tbody>
						<tr>
							<td>About me:</td>
							<td>{{nl2br($user->about_me)}}</td>
						</tr>
						<tr>
							<td>Contact mail:</td>
							<td>{{$user->contact_mail}}</td>
						</tr>
						<tr>
							<td>Telephone:</td>
							<td>{{$user->tel}}</td>
						</tr>
						<tr>
							<td>Mobile:</td>
							<td>{{$user->mobile}}</td>
						</tr>
						<tr>
							<td>Address:</td>
							<td>{{$user->address}}</td>
						</tr>
						<tr>
							<td>Url 1:</td>
							<td>{{$user->url_1}}</td>
						</tr>
						<tr>
							<td>Url 2:</td>
							<td>{{$user->url_2}}</td>
						</tr>
						<tr>
							<td>Url 3:</td>
							<td>{{$user->url_3}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


@stop