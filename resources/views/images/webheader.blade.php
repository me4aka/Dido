<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<div class="container">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-play "></span></a>
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
				<!-- <li><a href="/">Home <span class="sr-only">(current)</span></a></li> -->
				@foreach($albums_list as $album)
						<li><a href="/{{$album->name}}">{{$album->name}}</a></li>
				@endforeach
				</ul>

				<ul class="nav navbar-nav pull-right">
				<li><a href="about">About me</a></li>
				<li><a href="contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>